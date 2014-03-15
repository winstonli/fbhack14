constants= {
	"playlists" : "test.php",
	"songs" : "dummy.php"
};


$(document).ready( function() {
	requestJSON("12345", constants.playlists, "playlist");
});



function requestJSON(playlistNumber, page, divID) {
	request = new ajaxRequest();

	params  = "playlist=" + playlistNumber;
	
	request.open ("POST", page, true);
	request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	request.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200) {

			songs = $('#' + divID);

			response = this.responseText;

			playlist = jQuery.parseJSON(response);

			songs.html(response);

			// populateDivWithArray(songs, playlist.error);

		}
	}

	request.send(params);
}


function populateDivWithArray(div, array) {
	array.forEach(function(entry) {
		div.append("<div>" + entry + "</div>");
	});
}

