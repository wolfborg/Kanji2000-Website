<?php
	require 'database.php';
	session_start();

	function reset_progress(){

		$sql = "UPDATE `users` SET `user_progress` = 0 WHERE `user_id` = ".db_quote($_SESSION["user_id"]);
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