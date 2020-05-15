<?php

	require_once('../include/connect.php');

	class User {

		private $host = db_host;
		private $user = db_user;
		private $pass = db_pass;
		private $dbname = db_dbname;
		private $link;
		private $error;

		public function __construct() {
			$this->connect();
		}

		public function connect() {
			$this->link = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
		}

		public function userSignup($image, $email, $name, $password) {

			$query = $this->link->prepare("INSERT INTO users(image, email, name, password) VALUES (?, ?, ?, ?)");
			$query->bind_param("ssss", $image, $email, $name, $password);
			$query->execute();

			$query->close();
			$this->link->close();

		}

		public function userLogin($email, $password) {

			$query = $this->link->prepare("SELECT id, email, password FROM users WHERE email = ?");
			$query->bind_param("s", $email);
			$query->execute();
			$query->bind_result($id, $email, $password);

			$result = $query->get_result();
			$row = $result->fetch_assoc();
			$count = $result->num_rows;

			if(password_verify($password, $row['password'])) {

				if($count == 1) {

					$_SESSION['id'] = $row['id'];

				}

			}

			$query->close();
			$this->link->close();

		}

	}

?>