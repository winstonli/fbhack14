constants= {
	"playlist_create" : "http://162.13.180.132/api/playlist/create.php",
};


$(document).ready( function() {
	playlistCreate("66d5ee2f8d75fd84f78ac62ddbb93a40", "asdddddsads");
});




function playlistCreate(sessionToken, name) {
	$.post(
		constants.playlist_create,
		{
			session_token: sessionToken, 
			name: name
		},
		function(returnedData) {
			console.log(returnedData);
		}
	);
}


// function requestJSON(playlistNumber, page, divID) {
// 	request = new ajaxRequest();

// 	params = "";
// 	// params  = "playlist=" + playlistNumber;
	
// 	request.open ("POST", page, true);
// 	request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

// 	request.onreadystatechange = function(){
// 		if (this.readyState == 4 && this.status == 200) {

// 			songs = $('#' + divID);

// 			response = this.responseText;

// 			playlist = jQuery.parseJSON(response);

// 			songs.html(response);

// 			// populateDivWithArray(songs, playlist.error);

// 		}
// 	}

// 	request.send(params);
// }


function populateDivWithArray(div, array) {
	array.forEach(function(entry) {
		div.append("<div>" + entry + "</div>");
	});
}

