<?php
require 'database.php';
session_start();
// Validates form and allows the user to login
function user_login() {
	// Checks if form is submitted
	if(isset($_POST) && !empty($_POST) && isset($_POST["login"])) {
		//Checks if username is entered
		if(isset($_POST["username"]) && !empty($_POST["username"])) {
			$username = $_POST["username"];
		}
		else {
			echo "Username required.<br>";
		}

		// Checks if password is entered
		if(isset($_POST["password"]) && !empty($_POST["password"])) {
			$password = $_POST["password"];
		}
		else {
			echo "Password required.<br>";
		}

		// Logs in an existing user
		if(isset($username) && isset($password)) {
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
					$algorithm = "sha256";
					$iterations = 10000;
					$user_salt = $result[0]["user_salt"];
					$password = $_POST["password"];
					// Hashes entered password using the username's salt and PBKDF2
					$password = hash_pbkdf2($algorithm, $password, $user_salt, $iterations);

					// Checks for correct username and password
					$sql = "SELECT * FROM `users` WHERE (`user_name`=" . db_quote($username) . " AND `user_password`=" . db_quote($password) . ") LIMIT 1";
					$result = db_select($sql);
					
					// Checks for mysqli error
					if($result === false) {
						$error = db_error();
						echo $error;
					}
					else {
						// Checks for result
						if(!empty($result)) {
							echo "Login Successful<br>";
							// Creates user session
							$_SESSION['user_id'] = $result[0]['user_id'];
							$_SESSION['user_name'] = $result[0]['user_name'];
							$_SESSION['user_email'] = $result[0]['user_email'];
							header("location: dashboard.php");
						}
						else {
							echo "Invalid username or password. Please try again.<br>";
						}
					}
				}
				else {
					echo "Invalid username or password. Please try again.<br>";
				}
			}
		}
	}
}

user_login();

?>