window.onload = function() {
	setSessionToken("fede1f5ee0d30be9e81a49f36be19de1");
	var song = new Song(12, 1, "www", "name");
	alert(song.name());
	alert(song.youtube_url());
	alert(song.song_id());
	alert(song.position());
};

var playlists;

function Playlist(playlist_id, name) {
	var playlist_id = playlist_id;
	var name = name;
	var songs = new Array();

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

}