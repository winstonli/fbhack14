

function foo() {
	where = document.getElementById('watch7-secondary-actions');
	newChild = document.createElement('span');
	where.appendChild(newChild);

	newChild.style.height="50px"
	newChild.style.width="50px"

	newChild.style.position="absolute"
	newChild.style.left="245px"
	newChild.style.top="57px"
	newChild.style.display="inline-block"

	newChild.style.background="red"

	newChild.id="playlister"

	newChild.onclick = function(){
		window.location = "http://162.13.180.132/profile.php";
		console.log('asd')
	}

}


foo();