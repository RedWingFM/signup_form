<?php session_start(); ?>
<?php require_once('User.php'); ?>

<?php

	$User = new User();

	$errors = [];

	$email = $_POST['email'];
	$password = $_POST['password'];

	if($email == '') {
		$errors[] = "E-Mail field is empty!";
	}

	if($password == '') {
		$errors[] = "Password field is empty!";
	}

	if(strlen($password) < 8 && strlen($password) > 32) {
		$errors[] = "Password Must Contain at Least 8 Characters";
	}

	if(empty($errors)) {

		$User->userLogin($email, $password);

		echo "Hello!";
		echo "<script>setTimeout(function(){window.location.href = '../profile.php';}, 2000);</script>";

	} else {

		foreach($errors as $error) {

			echo "<p>" . $error . "</p>";

		}

	}

?>