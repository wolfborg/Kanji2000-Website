<?php
require 'database.php';
session_start();
// Validates form and allows the user to register
function user_register() {
	// Checks if form is submitted
	if(isset($_POST) && !empty($_POST) && isset($_POST["register"])) {
		// Checks if username is entrered
		if(isset($_POST["username"]) && !empty($_POST["username"])) {
			$username = $_POST["username"];
		}
		else {
			echo "Username required.<br>";
		}

		// Checks if email is entered
		if(isset($_POST["email"]) && !empty($_POST["email"])) {
			if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
				$email = $_POST["email"];
			} else {
				echo "Email invalid.<br>";
			}
		}
		else {
			echo "Email required.<br>";
		}

		// Checks if password is entered
		if(isset($_POST["password"]) && !empty($_POST["password"])) {
			$algorithm = "sha256";
			// Creates randomized salt for the new user
			$salt = mcrypt_create_iv(16, MCRYPT_DEV_URANDOM);
			$iterations = 10000;
			// Creates PBKDF2 hashed password for the new user
			$password = hash_pbkdf2($algorithm, $_POST["password"], $salt, $iterations);
		}
		else {
			echo "Password Required.<br>";
		}

		// Registers a new user
		if(isset($username) && isset($email) && isset($password)) {
			// Checks for existing username in database
			$sql = "SELECT * FROM `users` WHERE (`user_name`=" . db_quote($username) . ") LIMIT 1";
			$result = db_select($sql);

			// Checks for mysqli error
			if($result === false) {
				$error = db_error();
				echo $error;
			}
			else {
				// Checks for result
				if(!empty($result)) {
					echo "Username already exists. Please try again.<br>";
				}
				else {
					// Stores the new user's name, email, hashed password, and salt into the database
					$sql = "INSERT INTO `users` (`user_name`, `user_email`, `user_password`, `user_salt`) 
							VALUES (" . db_quote($username) . "," . db_quote($email) . "," . db_quote($password) . "," . db_quote($salt) . ")";
					$result = db_query($sql);
						
					// Checks for result
					if($result === false) {
					    $error = db_error();
					    echo $error;
					}
					else {
						$sql = "SELECT * FROM `users` WHERE (`user_name`=" . db_quote($username) . ") LIMIT 1";
						$result = db_select($sql);

						// Checks for mysqli error
						if($result === false) {
							$error = db_error();
							echo $error;
						}
						else {
							echo "Registered<br>";
							$_SESSION['user_id'] = $result[0]['user_id'];
							$_SESSION['user_name'] = $result[0]['user_name'];
							$_SESSION['user_email'] = $result[0]['user_email'];
							header("location: profile.php");
						}
					}
				}
			}
		}
	}
}

user_register();

?>