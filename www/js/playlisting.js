constants= {
	"playlist_create" : "http://162.13.180.132/api/playlist/create.php",
	"playlist_get" : "http://162.13.180.132/api/playlist/get.php",
	"playlist_delete" : "http://162.13.180.132/api/playlist/delete.php",
	"playlist_update" : "http://162.13.180.132/api/playlist/update.php",
};


$(document).ready( function() {
	playlistUpdate("66d5ee2f8d75fd84f78ac62ddbb93a40", "114", "it Worked");
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