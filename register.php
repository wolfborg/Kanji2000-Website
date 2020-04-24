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
			$hash = password_hash($_POST["password"], PASSWORD_BCRYPT);
		}
		else {
			echo "Password Required.<br>";
		}

		$firstName = "";
		$lastName = "";
		$level = 0;

		if (isset($_POST["firstName"])) {
			$firstName = $_POST["firstName"];
		}
		if (isset($_POST["lastName"])) {
			$lastName = $_POST["lastName"];
		}
		if (isset($_POST["skill"])) {
			if ($_POST["skill"] == "beginner") {
				$level = 0;
			}
			else if ($_POST["skill"] == "intermediate") {
				$level = 1;
			}
			else if ($_POST["skill"] == "expert") {
				$level = 2;
			}
		}

		// Registers a new user
		if(isset($username) && isset($email) && isset($hash)) {
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
					$sql = "INSERT INTO `users` (`user_name`, `user_email`, `user_hash`, `user_first_name`, `user_last_name`, `user_level`) 
							VALUES (" . db_quote($username) . "," . db_quote($email) . "," . db_quote($hash)  . "," . db_quote($firstName) . "," . db_quote($lastName) . "," . db_quote($level) . ")";
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
							$_SESSION['user_first_name'] = $result[0]['user_first_name'];
							$_SESSION['user_last_name'] = $result[0]['user_last_name'];
							$_SESSION['user_level'] = $result[0]['user_level'];
							header("location: dashboard.php");
						}
					}
				}
			}
		}
	}
}

user_register();

?>