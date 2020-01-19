function alpha_validation(input) {
	pattern = /^[a-z\d\-_\s]+$/i;
	if (pattern.test(input)) {
		return true;
	} else {
		alert('name error');
		return false;
	}
}

function email_validation(input) {
	pattern = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	if (pattern.test(input)) {
		return true;
	} else {
		alert('email error');
		return false;
	}
}

function validation() {
	var name = document.getElementById('name').value;
	var email = document.getElementById('email').value;
	console.log(name);
	if (!alpha_validation(name)) {
		return false;
	} else if (!email_validation(email)) {
		return false;
	} else {
		return true;
	}
}
