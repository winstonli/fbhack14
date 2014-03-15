constants= {
	"playlists" : "http://162.13.180.132/test.php",
};


$(document).ready( function() {
	getSongsForPlaylist("asd");
	// requestJSON("12345", constants.playlists, "playlist");
});


// $.post('test.php', 
// 	{ asd: "hello", field2 : "hello2"}, 
//     function(returnedData){
//          console.log(returnedData);
// });


function getSongsForPlaylist(playlistID) {
	$.post('test.php', 
		{ playlist: playlistID }, 
	    function(returnedData) {
	    	songs = jQuery.parseJSON(returnedData);

	    	console.log(songs);

			console.log(returnedData);
	});
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

