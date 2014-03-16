window.onload = function() {
	setSessionToken("fede1f5ee0d30be9e81a49f36be19de1");

};

function setSessionToken(sessionToken) {
	var expiration_date = new Date();
	var cookie_string = '';
	expiration_date.setFullYear(expiration_date.getFullYear() + 1);
	cookie_string = "session_token=" + sessionToken + "; path=/; expires=" + expiration_date.toGMTString();
	document.cookie = cookie_string;
}