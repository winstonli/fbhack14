var session_token;

window.onload = function() {
	setSessionToken("c45f5e999c50114fc6f9d16343c692ae");

	session_token = getSessionToken();
	initUI();
	userPlaylists(session_token, null);
};

var _playlists;

var activePlaylist;
var activeOtherPlaylist;

function setActivePlaylist(playlist) {
	activePlaylist = playlist;
	renderOwnSongs();
}

function updatePlaylists(playlists) {
	_playlists = new Array();
	playlists.list.forEach(function(playlist) {
		console.log("adding");
		console.log(playlist);
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

function playlistGetSuccess(playlists) {
	updatePlaylists(playlists);
}

function playlistUpdateSuccess(playlists) {
	updatePlaylists(playlists);
}

function Playlist(playlist_id, name) {
	var playlist_id = playlist_id;
	var name = name;
	var songs = new Array();

	this.id = function() {
		return playlist_id;
	}

	this.name = function() {
		return name;
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

	// var parts = document.cookie.split(/;\s*/);
	// for (var i = 0; i < parts.length; i++) {
	// 	var part = parts[i];
	// 	if (part.indexOf("session_token=") == 0) {
	// 		return part.substring("session_token=".length)
	// 	}
	// }
	// return null;
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