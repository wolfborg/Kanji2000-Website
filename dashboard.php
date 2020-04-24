<?php
require 'database.php';

session_start();
if(!isset($_SESSION['user_id'])) {
  header("location: index.php");
}

function printUserInfo() {
  $id = $_SESSION['user_id'];
  $sql = "SELECT * FROM `users` WHERE (`user_id`=" . db_quote($id) . ") LIMIT 1";
  $result = db_select($sql);

  // Checks for mysqli error
  if($result === false) {
    $error = db_error();
    echo $error;
  }
  else {
    // Checks for result
    if(!empty($result)) {
      $username = $result[0]['user_name'];
      $firstname = $result[0]['user_first_name'];
      $lastname = $result[0]['user_last_name'];
      $level = $result[0]['user_level'];
      $progress = $result[0]['user_progress'];
      //return array($kanji, $english);
      echo "<div id='user_info'><br>";
      echo "Username: " . $username . "<br>";
      echo "First Name: " . $firstname . "<br>";
      echo "Last Name: " . $lastname . "<br>";
      echo "Level: " . $level . "<br>";
      echo "Progress: " . $progress . "<br>";
    }
    else {
      echo "Invalid User ID. Please try again.<br>";
    }
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Dashboard</title>

<link rel="stylesheet" href="css/bootstrap.min.css" media="screen">

<script type="text/javascript" src="settings_validation.js"></script>
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
            <a class="navbar-brand" href="index.php">Kanji 2000</a></div>
      <div class="collapse navbar-collapse" id="topFixedNavbar1">
          
           
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
	  <div class="jumbotron col-sm-8 col-lg-10 col-lg-offset-1 col-sm-offset-2">
            <h1>Kanji 2000 Dashboard!</h1>
            <p>Welcome to Kanji 2000! Here you can view your information, start a quiz, or change your settings. </p>
            <?php
              printUserInfo();

            ?>
	  </div>
	
		
	</div>
	
	<div class="row">
    <a href="quiz.php">
	  <button class = "btn btn-primary btn-lg center-block" type="submit">Start Quiz</button></a>

	</div>

</div>
  
<div class="container" style="height: 90%">
<div class="row">
	
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
                
                <input type="radio" name="skill" value="beginner" class="required" <?php if ($_SESSION['user_level'] == 0) { echo "checked"; } ?> /> Beginner
                <input type="radio" name="skill" value="intermediate" class="required" <?php if ($_SESSION['user_level'] == 1) { echo "checked"; } ?> /> Intermediate
                <input type="radio" name="skill" value="expert" class="required" <?php if ($_SESSION['user_level'] == 2) { echo "checked"; } ?> /> Expert<br/><br/>
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
   
</body>
</html>
