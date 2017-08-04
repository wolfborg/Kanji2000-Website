<?php
require 'database.php';
session_start();
// Validates form and allows the user to register
function change_settings() {
	// Checks if form is submitted
	if(isset($_POST) && !empty($_POST) && isset($_POST["settings"])) {
		$sql = "SELECT * FROM `users` WHERE (`user_id`=" . $_SESSION["user_id"] . ") LIMIT 1";
		$result = db_select($sql);
		// Checks for mysqli error
		if($result === false) {
			$error = db_error();
			echo $error;
		}

		// Checks if password is entered
		if(isset($_POST["password"]) && !empty($_POST["password"]) && isset($_POST["confirmPassword"]) && !empty($_POST["confirmPassword"])) {
			$algorithm = "sha256";
			// Creates randomized salt for the new user
			$salt = mcrypt_create_iv(16, MCRYPT_DEV_URANDOM);
			$iterations = 10000;
			// Creates PBKDF2 hashed password for the new user
			$password = hash_pbkdf2($algorithm, $_POST["password"], $salt, $iterations);
		}
		if(isset($_POST["skill"]) && !empty($_POST["skill"])){
			switch($_POST["skill"]){
				case "beginner":
					$skill = 0;
					break;
				case "intermediate":
					$skill = 1;
					break;
				case "expert":
					$skill = 2;
					break;
			}
		}
		// Updates Password
		if(isset($password)) {
			// Stores the new user's name, email, hashed password, and salt into the database
			$sql = "UPDATE `users` SET `user_password` = " . db_quote($password) . ", `user_salt` = " . db_quote($salt) ." WHERE `user_id` = ".db_quote($_SESSION["user_id"]);
			$result = db_query($sql);
				
			// Checks for result
			if($result === false) {
			    $error = db_error();
			    echo $error;
			}
			else {
				header("location: dashboard.php");
				}
			}
		if(isset($skill)){
			$sql = "UPDATE `users` SET `user_level` = " . db_quote($skill) ." WHERE  `user_id` = " . db_quote($_SESSION["user_id"]);
			$result = db_query($sql);
				
			// Checks for result
			if($result === false) {
			    $error = db_error();
			    echo $error;
			}
			else {
				header("location: dashboard.php");
				}
			}
		}
				
	}

change_settings();

?>