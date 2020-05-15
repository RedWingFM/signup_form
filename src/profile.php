<?php session_start(); ?>
<?php require_once('include/connect.php'); ?>

<!DOCTYPE html>

<html lang="en">

	<head>

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>Test Project | My Profile</title>

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/profile.css">

	</head>

	<body>

		<main class="main" id="main">

			<div class="container">

				<div class="overlay-bg"></div>

					<?php if(isset($_GET['id']) || isset($_SESSION['id'])) {

						$query = $link->prepare("SELECT id, image,  email, name FROM users WHERE id = ?");
						$query->bind_param("i", $_SESSION['id']);
						$query->execute();
						$query->bind_result($id, $image, $email, $name);

						$result = $query->get_result();

						while($row = $result->fetch_assoc()) {

					?>

					<div class="profile">

						<h2 class="profile__header">My Profile</h2>

						<img src="<?php echo $row['image'] ?>" alt="avatar">

						<p class="profile-text">
							<i class="fas fa-id-badge"></i>
							<span class="text"><?php echo $row['id']; ?></span>
						</p>

						<p class="profile-text">
							<i class="fas fa-user"></i>
							<span class="text"><?php echo $row['name']; ?></span>
						</p>

						<p class="profile-text">
							<i class="fas fa-envelope"></i> <a href="mailto:<?php echo $row['email']; ?>"><?php echo $row['email']; ?></a>
						</p>

					<?php } ?>

					<?php } else { ?>

						<h2 class="profile__header">ERROR!</h2>
						<!--<script>setTimeout(function(){window.location.href = 'index.php';}, 100);</script>-->

					<?php } ?>

				</div>

			</div>

		</main>

	</body>

</html>