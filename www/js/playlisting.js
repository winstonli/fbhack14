constants= {
	"user_playlists" : "http://162.13.180.132/api/playlist/list.php",
	"playlist_create" : "http://162.13.180.132/api/playlist/create.php",
	"playlist_get" : "http://162.13.180.132/api/playlist/get.php",
	"playlist_delete" : "http://162.13.180.132/api/playlist/delete.php",
	"playlist_update" : "http://162.13.180.132/api/playlist/update.php",
	"song_insert" : "http://162.13.180.132/api/song/insert.php",
	"song_remove" : "http://162.13.180.132/api/song/remove.php",
	"song_swap" : "http://162.13.180.132/api/song/swap.php",
	"access_token" : "http://162.13.180.132/api/user/login_fb.php",
	"friends_update" : "http://162.13.180.132/api/user/update_friends.php",
	"friends_get" : "http://162.13.180.132/api/user/get_friends.php",

};


// $(document).ready( function() {
// 	userPlaylists("66d5ee2f8d75fd84f78ac62ddbb93a40", "29");
// });



function userPlaylists(sessionToken, user_id) {
	$.post(
		constants.user_playlists,
		{
			session_token: sessionToken,
			user_id: user_id
		},
		function(returnedData) {
			checkForError(returnedData);
			if (!returnedData.error) {
				userPlaylistsSuccess(returnedData.success.playlists);
			}
			console.log(returnedData);
		}
	);
}

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
				playlistCreateSuccess(returnedData.success.playlists);
			}

			console.log(returnedData)
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
				playlistDeleteSuccess(returnedData.success.playlists);
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
				playlistUpdateSuccess(returnedData.success.playlists);
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
				playlistGetSuccess(returnedData.success.playlist);
			}

			playlist = returnedData.success.playlist;


			console.log(playlist);
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


function songPushFront(sessionToken, playlist_id, youtube_url, name) {
	songInsert(sessionToken, playlist_id, "1", youtube_url, name);
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


function songSwap(sessionToken, playlist_id, position1, position2) {
	$.post(
		constants.song_swap,
		{
			session_token: sessionToken,
			playlist_id: playlist_id,
			position1: position1,
			position2: position2,
		},
		function(returnedData) {
			checkForError(returnedData);
			if (!returnedData.error) {
				console.log("Success songSwap");
			}

			console.log(returnedData);
		}
	);
}



function friendsUpdate(sessionToken) {
	$.post(
		constants.friends_update,
		{
			session_token: sessionToken,
		},
		function(returnedData) {
			checkForError(returnedData);
			if (!returnedData.error) {
				console.log("Success friendsUpdate");
			}

			console.log(returnedData);
		}
	);
}



function friendsGet(sessionToken) {
	$.post(
		constants.friends_get,
		{
			session_token: sessionToken,
		},
		function(returnedData) {
			checkForError(returnedData);
			if (!returnedData.error) {
				console.log("Success friendsGet");
			}

			console.log(returnedData);
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