<?php

require 'database.php';
session_start();

function reset_progress(){
	$user_id = $_SESSION["user_id"];

	$sql = "DELETE FROM `user_kanji_progress` WHERE (`user_id`=" . db_quote($user_id) . ")";
	$result = db_query($sql);
	
	// Checks for mysqli error
	if($result === false) {
		$error = db_error();
		echo $error;
	}

	$sql = "UPDATE `users` SET `user_progress` = 0 WHERE `user_id` = " . db_quote($user_id);
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

reset_progress();

?>