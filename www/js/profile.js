var session_token;

window.onload = function() {
	session_token = getSessionToken();
	if (!session_token) {
		console.log("No session token")
	}
	initUI();
	userPlaylists(session_token, null);
};

var _playlists;

var activePlaylist;
var activeOtherPlaylist;

function setActivePlaylist(playlist) {
	activePlaylist = playlist;
	playlistGet(session_token, playlist.id());
	renderOwnSongs();
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

function playlistCreateSuccess(playlists) {
	updatePlaylists(playlists);
}

function playlistDeleteSuccess(playlists) {
	updatePlaylists(playlists);
}

function playlistGetSuccess(playlist) {
	_playlists.forEach(function(pl) {
		if (pl.id() == playlist.playlist_id) {
			pl.setSongs(pl.songs());
			console.log(pl.songs());
		}
	});
}

function playlistUpdateSuccess(playlists) {
	updatePlaylists(playlists);
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

function renderOwnPlaylist() {
	$('#playlists_self').empty();
	var done = true;
	$('#playlists_self').append('<li><a href="#" id="playlist_self_box_add" class="account_settings"><span>+</span></a></li>');
	$('#playlist_self_box_add').click(function(e) {
		if (done) {
			$('#playlist_self_box_add').find('span').append('<input class="text"></input>');
			done = false;
		}
		return false;
	});
	_playlists.forEach(function(playlist) {
		$('#playlists_self').append('<li><a href="#" id="playlist_self_box_' + playlist.id() + '" class="account_settings"><span>' + playlist.name() + '</span></a></li>');
		$('#playlist_self_box_' + playlist.id()).click(function() {
			setActivePlaylist(playlist);
			return false;
		});
	});
}

function renderOwnSongs() {
	$('#active_playlist_self').html(activePlaylist.name());
	$('#songs_self').empty();
	activePlaylist.songs.forEach(function(song) {
		$('#songs_self').append('<li><a href="#" id="song_self_box_' + song.song_id() + '" class="account_settings"><span>' + song.name() + '</span></a></li>');
		$('#song_self_box_' + song.song_id()).click(function() {
			alert("PLAYING SONG WITH URL: " + song.youtube_url());
			return false;
		});
	});
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