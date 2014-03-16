window.onload = function() {
	alert("setting");
};

var expiration_date = new Date();
var cookie_string = '';
expiration_date.setFullYear(expiration_date.getFullYear() + 1);
// Build the set-cookie string:
cookie_string = "test_cookies=true; path=/; expires=" + expiration_date.toGMTString();
// Create/update the cookie:
document.cookie = cookie_string;