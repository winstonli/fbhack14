

function foo() {
	x = document.body.style.backgroundColor="blue"
	x = document.getElementById('rightCol')
	x.parentNode.removeChild(x)
}


foo();