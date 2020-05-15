<?php session_start(); ?>
<?php require_once('User.php'); ?>

<?php

	$User = new User();

	$errors = [];

	$email = $_POST['email'];
	$name = $_POST['name'];
	$password = $_POST['password'];

	if($_FILES['image']['name'] == '') {
		$errors[] = "Image field is empty!";
	}

	if($_FILES['image']['size'] >= '2048000') {
		$errors[] = "File size cannot exceed 2Mb!";
	}

	if($_FILES['image']['type'] != 'image/png' && $_FILES['image']['type'] != 'image/jpg' && $_FILES['image']['type'] != 'image/gif') {
		$errors[] = "Incorrect image format! Only jpg, png and gif files are supported";
	}

	if($email == '') {
		$errors[] = "E-Mail field is empty!";
	}

	if($name == '') {
		$errors[] = "Name field is empty!";
	}

	if($password == '') {
		$errors[] = "Password field is empty!";
	}

	if(strlen($password) < 8) {
		$errors[] = "Password must be between 8 and 32 characters";
	}

	if(empty($errors)) {

		$tmp_name = $_FILES['image']['tmp_name'];
		$filename = basename($_FILES['image']['name']);
		$location = "../img/" . $name;
		$image = "$location/$filename";

		if(!is_dir($location)) {
			mkdir($location);
		}

		move_uploaded_file($tmp_name, $image);

		$password = password_hash($password, PASSWORD_BCRYPT);

		$User->userSignup($image, $email, $name, $password);

		echo "Thank you for joining Us!";
		echo "<script>setTimeout(function(){window.location.href = '../profile.php';}, 2000);</script>";

	} else {

		foreach($errors as $error) {

			echo "<p>" . $error . "</p>";

		}

	}

?>