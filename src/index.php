<?php session_start(); ?>

<!DOCTYPE html>

<html lang="en">

	<head>

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>Test Project | Join Us</title>

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/form.css">

		<script src="js/style.js"></script>

	</head>

	<body>

		<main class="main" id="main">

			<div class="overlay-bg"></div>

			<div class="container">

				<div class="grid-container__custom">

					<button class="signup-button">
						<i class="fas fa-user-plus"></i>
						Signup
					</button>

					<button class="login-button">
						<i class="fas fa-sign-in-alt"></i>
						Login
					</button>

				</div>

				<button class="lang-button">Change Language</button>

				<form class="signup-form" action="app/userSignup.php" enctype="multipart/form-data" method="POST">

					<h2 class="form-header" data-ru-text="Регистрация">Signup</h2>

					<div class="form-row">
						<label for="image" data-ru-text="Изображение">Image</label>
						<input tabindex="1"
							   id="signup-image"
							   name="image"
							   type="file"
							   placeholder="Your File..."
							   required>
						<span class="error-text" data-ru-text="Это поле не должно быть пустым">This field cannot be empty</span>
					</div>

					<div class="form-row">
						<label for="email" data-ru-text="Почта">Email</label>
						<input tabindex="2"
							   id="signup-email"
							   name="email"
							   type="email"
							   placeholder="user@gmail.com"
							   pattern="[A-Za-z]{4,}@gmail\.com"
							   autocomplete="off"
							   required>
						<span class="error-text" data-ru-text="Поле с почтой должно содержать латиницу">Email field must contain only Latin Letters</span>
					</div>

					<div class="form-row">
						<label for="name" data-ru-text="Имя">Name</label>
						<input tabindex="3"
							   id="signup-name"
							   name="name"
							   type="text"
							   placeholder="John"
							   pattern="[A-Za-z]{4,}"
							   autocomplete="off"
							   required>
						<span class="error-text" data-ru-text="Поле с именем должно содержать только латиницу">Name field must contain only Latin Letters</span>
					</div>

					<div class="form-row">
						<label for="password" data-ru-text="Пароль">Password</label>
						<input tabindex="4"
							   id="signup-password"
							   name="password"
							   type="password"
							   placeholder="********"
							   pattern="[A-Za-z0-9@#!$%&*]{8,}"
							   autocomplete="off"
							   required>
						<span class="error-text" data-ru-text="Пароль должен содержать как минимум 8 символов">Password Must Contain at Least 8 Characters</span>
					</div>

					<input id="signup-submit" name="submit" type="submit" value="Join Us!" data-ru-text="Присоединиться!">

				</form>

				<form class="login-form" action="app/userLogin.php" method="POST">

					<h2 class="form-header" data-ru-text="Авторизация">Login</h2>

					<div class="form-row">
						<label for="email" data-ru-text="Почта">Email</label>
						<input tabindex="5"
							   id="login-email"
							   name="email"
							   type="email"
							   placeholder="user@gmail.com"
							   pattern="[A-Za-z]{4,}@gmail\.com"
							   autocomplete="off"
							   required>
						<span class="error-text" data-ru-text="Поле с почтой должно содержать латиницу">Email field must contain only Latin Letters</span>
					</div>

					<div class="form-row">
						<label for="password" data-ru-text="Пароль">Password</label>
						<input tabindex="6"
							   id="login-password"
							   name="password"
							   type="password"
							   placeholder="********"
							   pattern="[A-Za-z0-9@#!$%&*]{8,}"
							   autocomplete="off"
							   required>
						<span class="error-text" data-ru-text="Пароль должен содержать как минимум 8 символов">Password Must Contain at Least 8 Characters</span>
					</div>

					<input id="login-submit" name="submit" type="submit" value="Login" data-ru-text="Авторизоваться">

				</form>

			</div>

		</main>

	</body>

</html>