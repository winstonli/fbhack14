constants= {
	"playlist_create" : "http://162.13.180.132/api/playlist/create.php",
	"playlist_get" : "http://162.13.180.132/api/playlist/get.php",
};


$(document).ready( function() {
	playlistGet("66d5ee2f8d75fd84f78ac62ddbb93a40", "74");
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