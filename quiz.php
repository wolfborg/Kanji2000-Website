<?php
session_start();
require 'database.php';

function getRandomKanji() {
	$sql = "SELECT COUNT(*) FROM `kanji` LIMIT 1";
	$result = db_select($sql);

	// Checks for mysqli error
	if($result === false) {
		$error = db_error();
		echo $error;
	}
	else {
		// Checks for result
		if(!empty($result)) {
			$max = $result[0]['COUNT(*)'];
			$id = rand(1,$max);
			return getKanji($id);
			//return array($kanji, $english);
		}
		else {
			echo "Please try again.<br>";
		}
	}
}

function getRandomAnswer() {
	$kanji = getRandomKanji();
	return $kanji[1];
}

function getRandomAnswers() {
	$answers = array();

	while(count($answers) < 4) {
		$rand = getRandomAnswer();
		if (!in_array($rand, $answers)) {
			$answers[] = $rand;
		}
	}

	return $answers;
}

function getNewUserKanji() {
	$user_id = $_SESSION["user_id"];

	$kanji = getRandomKanji();

	$sql = "SELECT * FROM `user_kanji_progress` WHERE (`user_id`=" . db_quote($user_id) . " AND `kanji_id`=" . db_quote(getKanjiIdByJap($kanji[0])) . ") LIMIT 1";
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
			return $kanji;
		}

		return getNewUserKanji();
	}
}

function getKanji($id) {
	$sql = "SELECT * FROM `kanji` WHERE (`kanji_id`=" . db_quote($id) . ") LIMIT 1";
	$result = db_select($sql);

	// Checks for mysqli error
	if($result === false) {
		$error = db_error();
		echo $error;
	}
	else {
		// Checks for result
		if(!empty($result)) {
			$kanji = $result[0]['kanji_jap'];
			$english = $result[0]['kanji_eng'];
			return array($kanji, $english);
		}
		else {
			echo "Invalid Kanji. Please try again.<br>";
		}
	}
}

function getKanjiIdByJap($kanji_jap) {
	$sql = "SELECT `kanji_id` FROM `kanji` WHERE (`kanji_jap` = " . db_quote($kanji_jap) . ") LIMIT 1";
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

function getKanjiIdByEng($kanji_eng) {
	$sql = "SELECT `kanji_id` FROM `kanji` WHERE (`kanji_eng`=" . db_quote($kanji_eng) . ") LIMIT 1";
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

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>Dashboard</title>

<link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
<link rel="stylesheet" href="css/style.css" media="screen">


<script src="https://code.jquery.com/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>

<style>
	  .img-center{
		  padding-top: auto;
		}
	.customButton{
		width: 100%;
	}
</style>
</head>

<body style="padding-top: 0px">
<header>
  <nav class="navbar navbar-default">
   	<div class="container-fluid">
         	<div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#topFixedNavbar1" aria-expanded="false"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            <a class="navbar-brand" href="index.php">Kanji 2000</a></div>
      <div class="collapse navbar-collapse" id="topFixedNavbar1">
            
            <form class="navbar-form navbar-left" role="search">
              <div class="form-group"> </div>
			</form>
           
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
               
            <span class="glyphicon glyphicon-user"> Account</span></a>
                <ul class="dropdown-menu">
                  <li><a href="logout.php">Logout</a></li>
                  <li><a href="#" data-toggle="modal" data-target="#settingsModal">Settings</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
    </nav>
</header>

<main>  
<div class="container" style="height: 90%">
<div class="row">   
	<div class="jumbotron col-8 col-sm-offset-0 col-lg-4 col-lg-offset-4">
		<div id="quiz">
			<div class="container" align="center">
				<div id="el_kanji" class="el_kanji" align="center">
					<?php 
						$rands = getRandomAnswers();
						//$kanji = getRandomKanji();
						$kanji = getNewUserKanji();
						while (in_array($kanji[1], $rands)) {
							//$kanji = getRandomKanji();
							$kanji = getNewUserKanji();
						}
					?>
					<h1 id="kanji"><?php echo $kanji[0]; ?></h1>
					<h1 id="english" style="display:none"><?php echo $kanji[1]; ?></h1>
					<h1 id="last" style="display:none"></h1>
				</div>

	 			<br><br>
	 		 </div>
	  
			<div id="answers" class="row" align="center">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<?php echo '<button id="A" type="button" class="btn btn-lg btn-default customButton" value="' . $rands[0] . '">' . $rands[0] . '</button>' ?>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<?php echo '<button id="B" type="button" class="btn btn-lg btn-default customButton" value="' . $rands[1] . '">' . $rands[1] . '</button>' ?>
				</div>
				<br><br><br><br>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<?php echo '<button id="C" type="button" class="btn btn-lg btn-default customButton" value="' . $rands[2] . '">' . $rands[2] . '</button>' ?>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<?php echo '<button id="D" type="button" class="btn btn-lg btn-default customButton" value="' . $rands[3] . '">' . $rands[3] . '</button>' ?>
				</div>
				<br><br><br><br>
			</div>
		</div>
		<div class="row" align="center">
		<div class="col-lg-12">
			<div class="progress" style="background-color: grey">
				<div id="bar" class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:0%"></div>
			</div>             
		</div> 
		 
		 <div class="col-sm-6 col-lg-12 col-sm-offset-3 col-md-offset-3 col-lg-offset-0">
		 	<h3 id="numberQuestion"> 1 </h3>
		 </div>
		 <div class="col-sm-12"></div>
	    </div> 
	</div>
</div>
</div>
</main>



<footer class="footer" align="center">
      <div class="container">
        <p class="text-muted">Wentworth Institute of Technology</p>
      </div>
</footer>

<div id="settingsModal" class="modal fade" role="dialog">
  <div id="settingsModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" id="settings-close" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Settings</h4>
        </div>
        <div class="modal-body">
          <form method="post" action="settings.php" id="settings-form">
            <fieldset>
              <h4>Change Password</h4>
              <label>Enter Password:</label> <input type="password" name="password" size="25" class="required"/><br/>
              <label>Confirm Password:</label> <input type="password" name="confirmPassword" size="25" class="required"/>
				<br><br>
              <h4>Change Your Skill Level:</h4>

                <input type="radio" name="skill" value="beginner" class="required"/> Beginner
                <input type="radio" name="skill" value="intermediate" class="required"/> Intermediate
                <input type="radio" name="skill" value="expert" class="required"/> Expert<br/><br/>
                <div class="rectangle centered"> 

                <div>
                <input name="settings" type=submit class="btn btn-default" value="Save Changes"/>
               </div>
              </div>
            </fieldset>
          </form>
          </br>
          <form method="post" action="reset_progress.php" id="reset-form">
              <input type="submit" name="reset" class="btn btn-danger" value="Reset Progress"/>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
   
<script src="KanjiQuiz.js"></script>   
</body>
</html>
