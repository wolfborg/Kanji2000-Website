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

		// Checks for password change
		if(isset($_POST["password"]) && !empty($_POST["password"]) && isset($_POST["confirmPassword"]) && !empty($_POST["confirmPassword"])) {
			$hash = password_hash($_POST["password"], PASSWORD_BCRYPT);
		}

		// Checks for first name change
		if(isset($_POST["firstName"]) && $_POST["firstName"] != $_SESSION["user_first_name"]) {
			$firstName = $_POST["firstName"];
		}

		// Checks for last name change
		if(isset($_POST["lastName"]) && $_POST["lastName"] != $_SESSION["user_last_name"]) {
			$lastName = $_POST["lastName"];
		}

		// Checks for skill change
		if(isset($_POST["skill"]) && !empty($_POST["skill"]) && $_POST["skill"] != $_SESSION["user_level"]){
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
		if(isset($hash)) {
			// Stores the new user's name, email, hashed password, and salt into the database
			$sql = "UPDATE `users` SET `user_hash` = " . db_quote($hash) . " WHERE `user_id` = " . db_quote($_SESSION["user_id"]);
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

		// Updates first name
		if (isset($firstName)) {
			$sql = "UPDATE `users` SET `user_first_name` = " . db_quote($firstName) ." WHERE  `user_id` = " . db_quote($_SESSION["user_id"]);
			$result = db_query($sql);
			
			// Checks for result
			if($result === false) {
			    $error = db_error();
			    echo $error;
			}
			else {
				$_SESSION['user_first_name'] = $firstName;
				header("location: dashboard.php");
			}
		}

		// Updates last name
		if (isset($lastName)) {
			$sql = "UPDATE `users` SET `user_last_name` = " . db_quote($lastName) ." WHERE  `user_id` = " . db_quote($_SESSION["user_id"]);
			$result = db_query($sql);
			
			// Checks for result
			if($result === false) {
			    $error = db_error();
			    echo $error;
			}
			else {
				$_SESSION['user_last_name'] = $lastName;
				header("location: dashboard.php");
			}
		}

		// Updates skill
		if(isset($skill)) {
			$sql = "UPDATE `users` SET `user_level` = " . db_quote($skill) ." WHERE  `user_id` = " . db_quote($_SESSION["user_id"]);
			$result = db_query($sql);
				
			// Checks for result
			if($result === false) {
			    $error = db_error();
			    echo $error;
			}
			else {
				$_SESSION['user_level'] = $skill;
				header("location: dashboard.php");
			}
		}
	}		
}

change_settings();

?>