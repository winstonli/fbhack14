$(document).ready( function() {
	requestPlaylist();
});



function requestPlaylist() {
	params  = "playlist=12345";
	request = new ajaxRequest();
	request.open ("POST", "dummy.php", true);
	request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	request.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200) {

			songs = $('#songs');

			response = this.responseText;

			playlist = jQuery.parseJSON(response);

			populateDivWithArray(songs, playlist.songs);

		}
	}

	request.send(params);
}


function populateDivWithArray(div, array) {
	array.forEach(function(entry) {
		div.append("<div>" + entry + "</div>");
	});
}

