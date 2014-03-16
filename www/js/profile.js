var session_token;

window.onload = function() {
	setSessionToken("fede1f5ee0d30be9e81a49f36be19de1");
	
	session_token = getSessionToken();
	userPlaylists("fede1f5ee0d30be9e81a49f36be19de1", null);
};

var _playlists;

var activePlaylist;
var activeOtherPlaylist;

function userPlaylistsSuccess(playlists) {
	playlists.list.forEach(function(playlist) {
		_playlists = new Array();
		_playlists.push(new Playlist(playlist.playlist_id, playlist.name));
	})
	console.log("PLAYLISTS: " + _playlists);
}

function playlistCreateSuccess() {
	console.log("CALLBACK SUCC");
}

function Playlist(playlist_id, name) {
	var playlist_id = playlist_id;
	var name = name;
	var songs = new Array();

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
	var parts = document.cookie.split(/;\s*/);
	for (var i = 0; i < parts.length; i++) {
		var part = parts[i];
		if (part.indexOf("session_token=") == 0) {
			return part.substring("session_token=".length)
		}
	}
	return null;
}

function renderPlaylist(divID) {
	playlists.forEach(function(playlist) {
		console.log(playlist.name());
	});
}

function renderSongs(divID) {

}