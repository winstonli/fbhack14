var session_token;

var self;

function getURLParameter(name) {
  return decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(location.search)||[,""])[1].replace(/\+/g, '%20'))||null
}

window.onload = function() {
	session_token = getSessionToken();
	if (!session_token) {
		console.log("No session token");
	}
	var user = getURLParameter("user");
	console.log("user: " + user);
	userGet(session_token, user);
	initUI();
	userPlaylists(session_token, user);

};

var _playlists;

var activePlaylist;
var activeOtherPlaylist;

function setActivePlaylist(playlist) {
	activePlaylist = playlist;
	playlistGet(session_token, playlist.id());
	renderOwnSongs(true);
}

function updatePlaylists(playlists) {
	_playlists = new Array();
	playlists.list.forEach(function(playlist) {
		_playlists.push(new Playlist(playlist.playlist_id, playlist.name));
	});
	renderOwnPlaylist();
}

function userPlaylistsSuccess(playlists) {
	updatePlaylists(playlists);
}

function userGetSuccess(user) {
	$('#fullname').html(user.first_name + ' ' + user.last_name);
	$('#dp').attr('src', user.dp_url);
	self = user.self;
}

function playlistCreateSuccess(playlists) {
	updatePlaylists(playlists);
}

function playlistDeleteSuccess(playlists) {
	updatePlaylists(playlists);
}

function updatePlaylist(playlist, animated) {
	_playlists.forEach(function(pl, index, array) {
		if (pl.id() == playlist.playlist_id) {
			pl.setSongs(playlist.songs.list);
			array[index] = pl;
		}
	});
	console.log(_playlists);
	renderOwnSongs(animated);
}

function playlistGetSuccess(playlist) {
	updatePlaylist(playlist, true);
}

function playlistUpdateSuccess(playlists) {
	updatePlaylists(playlists);
}

function songInsertSuccess(playlist) {
	updatePlaylist(playlist, false);
}

function songRemoveSuccess(playlist) {
	updatePlaylist(playlist, false);
}

function Playlist(playlist_id, name) {
	var playlist_id = playlist_id;
	var name = name;
	var songs;

	this.id = function() {
		return playlist_id;
	}

	this.name = function() {
		return name;
	}

	this.setSongs = function(s) {
		songs = s;
	}

	this.songs = function() {
		return songs;
	}

	this.setSongAtPosition = function(position, song) {
		songs[position] = song;
	}

	this.songAtPosition = function(position) {
		return songs[position];
	}
}

function Song(song_id, position, youtube_url, name) {
	var song_id = song_id;
	var position = position;
	var youtube_url = youtube_url;
	var name = name;

	this.song_id = function() {
		return song_id;
	}

	this.position = function() {
		return position;
	}

	this.name = function() {
		return name;
	}

	this.youtube_url = function() {
		return youtube_url;
	}
}

function setSessionToken(sessionToken) {
	var expiration_date = new Date();
	var cookie_string = '';
	expiration_date.setFullYear(expiration_date.getFullYear() + 1);
	cookie_string = "session_token=" + sessionToken + "; path=/; expires=" + expiration_date.toGMTString();
	document.cookie = cookie_string;
}

function getSessionToken() {
	return getCookie('session_token');
}

textBox = 0;

function renderOwnPlaylist() {
	$('#playlists_self').empty();
	var done = true;
	if (self) {
		$('#playlists_self').append('<li><a href="#" id="playlist_self_box_add" class="account_settings"><span>+</span></a></li>');
		$('#playlist_self_box_add').click(function(e) {
			if (done) {
				addToPlaylist = $('#playlist_self_box_add');
				addToPlaylist.find('span').append('<input class="text" placeholder="Playlist Name"></input>');

				textBox = addToPlaylist.find('input');
				textBox.focus();
				textBox.keyup(function (e) {
				    if (e.keyCode == 13) {
				        playlistCreate(getSessionToken(), e.target.value);
				    }
				});

				done = false;
			}
			return false;
		});
	}
	_playlists.forEach(function(playlist) {
		var str = '<li><a href="#" id="playlist_self_box_' + playlist.id() + '" class="account_settings"><span>' + playlist.name() + '</span>';
		if (self) {
			str += '<span id="playlist_delete_' + playlist.id() + '" class="delete">Delete</span></a></li>'
		}
		$('#playlists_self').append(str);
		$('#playlist_self_box_' + playlist.id()).click(function() {
			setActivePlaylist(playlist);
			return false;
		});
		$('#playlist_delete_' + playlist.id()).click(function() {
			playlistDelete(session_token, playlist.id());
			return false;
		});
	});
}

function parseYoutubeAndInsert(session_token, playlist_id, url) {
	$.get("http://162.13.180.132/api/parse_page.php?url=" + url, function(data) {
		songInsert(session_token, playlist_id, 1, url, $(data).find("#eow-title").html());
	});
}

function renderOwnSongs(animated) {
	$('#active_playlist_self').html(activePlaylist.name());
	if (animated) {
		$('#songs_self').hide();
	}
	$('#songs_self').empty();
	var done = true;
	if (self) {
		$('#songs_self').append('<li><a href="#" id="song_self_box_add" class="account_settings"><span>+</span></a></li>');
		$('#song_self_box_add').click(function(e) {
			if (done) {
				addToPlaylist = $('#song_self_box_add');
				addToPlaylist.find('span').append('<input class="text" placeholder="YouTube URL" size="50"></input>');

				textBox = addToPlaylist.find('input');
				textBox.focus();
				textBox.keyup(function (e) {
				    if (e.keyCode == 13) {
				    	parseYoutubeAndInsert(session_token, activePlaylist.id(), e.target.value);
				    }
				});

				done = false;
			}
			return false;
		});
	}
	var s = activePlaylist.songs();
	if (s) {
		s.forEach(function(song) {
			var str = '<li><a href="#" id="song_self_box_' + song.song_id + '" class="account_settings"><span>' + song.name + '</span>';
			if (self) {
				str += '<span id="song_delete_' + song.song_id + '" class="delete">Delete</span></a></li>';
			}
			$('#songs_self').append(str);
			$('#song_self_box_' + song.song_id).click(function() {
				youtube_id = song.youtube_url.substr(-11);
				console.log("PLAYING SONG WITH URL: " + song.youtube_url);
				console.log(youtube_id);
				onChangeVideo(youtube_id);

				// Update the player
				$('#song').html(song.name);
                $("#playBtn").removeClass("playBtn").addClass("pauseBtn");
            	isPlaying = true;


				return false;
			});
			$('#song_delete_' + song.song_id).click(function() {
				songRemove(session_token, activePlaylist.id(), song.song_id);
				return false;
			});
		});
	}
	if (animated) {
		$('#songs_self').show('fast');
	}
}

function initUI() {
	$("#playlist_add_button").click(function() {
		playlistCreate(session_token, "newplaylist");
	});
}


function getCookie(cname)
{
var name = cname + "=";
var ca = document.cookie.split(';');
for(var i=0; i<ca.length; i++)
  {
  var c = ca[i].trim();
  if (c.indexOf(name)==0) return c.substring(name.length,c.length);
  }
return "";
}