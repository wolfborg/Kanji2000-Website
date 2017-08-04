<?php
session_start();
require 'database.php';
//include 'reset_progress.php';

function kanji_progress_up($kanji_id) {
	$user_id = $_SESSION["user_id"];

	$sql = "SELECT `progress` FROM `user_kanji_progress` WHERE (`user_id`=" . db_quote($user_id) . " AND `kanji_id`=" . db_quote($kanji_id) . ") LIMIT 1";
	$result = db_select($sql);
	
	// Checks for mysqli error
	if($result === false) {
		$error = db_error();
		echo $error;
	}
	else {
		// Checks for result
		if(empty($result)) {
			//if ($result[0]['progress'] < 3) { )
			$sql = "INSERT INTO `user_kanji_progress` (`user_id`, `kanji_id`) VALUES (" . $user_id . ", " . $kanji_id . ")";
			$result = db_query($sql);

			if($result === false) {
				$error = db_error();
				echo $error;
			}
			else {
				$sql = "UPDATE `users` SET `user_progress`= `user_progress` + 1 WHERE `user_id`=" . db_quote($user_id);
				$result = db_query($sql);
				if($result === false) {
					$error = db_error();
					echo $error;
				} else {
					$sql = "SELECT `user_progress` FROM `users` WHERE (`user_id` = " . db_quote($user_id) . ") LIMIT 1";
					$result = db_select($sql);

					if($result === false) {
						$error = db_error();
						echo $error;
					}
					else {
						if (!empty($result)) {
							//echo $result[0]['user_progress'] . "<br>" . kanjiTotal();
							if ($result[0]['user_progress'] == kanjiTotal()) {
								reset_progress();
							}
						}
					}
				}
			}
		} else {
			// add one to existing progress
			// can be used later to check for 3 progress on a kanji
			$sql = "UPDATE `users_kanji_progress` SET `progress`= `progress` + 1 WHERE `user_id`=" . db_quote($user_id) . " AND `kanji_id`=" . db_quote($kanji_id);
			$result = db_query($sql);
			if($result === false) {
				$error = db_error();
				echo $error;
			}
		}
	}
}

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
}

function kanjiTotal() {
	$sql = "SELECT COUNT(*) FROM `kanji` LIMIT 1";
	$result = db_select($sql);
	
	// Checks for mysqli error
	if($result === false) {
		$error = db_error();
		echo $error;
	} else {
		return $result[0]['COUNT(*)'];
	}
}

function getKanjiIdByJap($kanji_jap) {
	$sql = "SELECT `kanji_id` FROM `kanji` WHERE (`kanji_jap`=" . db_quote($kanji_jap) . ") LIMIT 1";
	$result = db_select($sql);
	
	// Checks for mysqli error
	if($result === false) {
		$error = db_error();
		echo $error;
	}
	else {
		if (!empty($result)) {
			return $result[0]['kanji_id'];
		}
		else {
			echo "Kanji ID not found. Please try again.<br>";
		}
	}
}

if (isset($_POST["kanji_jap"])) {
	$kanji = getKanjiIdByJap($_POST["kanji_jap"]);
	kanji_progress_up($kanji);
} else {
	echo "Kanji not found.<br>";
}

?>