constants= {
	"playlist_create" : "http://162.13.180.132/api/playlist/create.php",
	"playlist_get" : "http://162.13.180.132/api/playlist/get.php",
	"playlist_delete" : "http://162.13.180.132/api/playlist/delete.php",
	"playlist_update" : "http://162.13.180.132/api/playlist/update.php",
	"song_insert" : "http://162.13.180.132/api/song/insert.php",
	"song_remove" : "http://162.13.180.132/api/song/remove.php",
};


$(document).ready( function() {
	songRemove("66d5ee2f8d75fd84f78ac62ddbb93a40", "114", "2");
});




function playlistCreate(sessionToken, name) {
	$.post(
		constants.playlist_create,
		{
			session_token: sessionToken,
			name: name
		},
		function(returnedData) {
			checkForError(returnedData);
			if (!returnedData.error) {
				console.log("Success playlistCreate");
			}
		}
	);
}


function playlistDelete(sessionToken, playlistId) {
	$.post(
		constants.playlist_delete,
		{
			session_token: sessionToken,
			playlist_id: playlistId
		},
		function(returnedData) {
			checkForError(returnedData);
			if (!returnedData.error) {
				console.log("Success playlistDelete");
			}

			console.log(returnedData);
		}
	);
}


function playlistUpdate(sessionToken, playlistId, name) {
	$.post(
		constants.playlist_update,
		{
			session_token: sessionToken,
			playlist_id: playlistId,
			name: name
		},
		function(returnedData) {
			checkForError(returnedData);
			if (!returnedData.error) {
				console.log("Success playlistUpdate");
			}

			console.log(returnedData);
		}
	);
}


function songInsert(sessionToken, playlist_id, position, youtube_url, name) {
	$.post(
		constants.song_insert,
		{
			session_token: sessionToken,
			playlist_id: playlist_id,
			position: position,
			youtube_url: youtube_url,
			name: name
		},
		function(returnedData) {
			checkForError(returnedData);
			if (!returnedData.error) {
				console.log("Success songInsert");
			}

			console.log(returnedData);
		}
	);
}

function songRemove(sessionToken, playlist_id, position) {
	$.post(
		constants.song_remove,
		{
			session_token: sessionToken,
			playlist_id: playlist_id,
			position: position,
		},
		function(returnedData) {
			checkForError(returnedData);
			if (!returnedData.error) {
				console.log("Success songRemove");
			}

			console.log(returnedData);
		}
	);
}

function songPushFront(sessionToken, playlist_id, youtube_url, name) {
	songInsert(sessionToken, playlist_id, "1", youtube_url, name);
}




function playlistGet(sessionToken, playlistId) {
	$.post(
		constants.playlist_get,
		{
			session_token: sessionToken,
			playlist_id : playlistId
		},
		function(returnedData) {
			checkForError(returnedData);

			if (!returnedData.error) {
				console.log("Success playlistGet");
			}

			playlist = returnedData.success.playlist;


			console.log(playlist);
		}
	);
}





function populateDivWithArray(div, array) {
	array.forEach(function(entry) {
		div.append("<div>" + entry + "</div>");
	});
}




function checkForError(obj) {
	if (obj.error) {
		console.log(obj);
	}
}