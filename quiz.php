<?php
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
	}//Test
}

function getKanji($id) {
	$sql = "SELECT * FROM `kanji` WHERE (`kanji_id`=" . db_quote($id) . ") LIMIT 1";
	$result = db_select($sql);
//
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
            <a class="navbar-brand" href="#">Kanji-2000</a></div>
      <div class="collapse navbar-collapse" id="topFixedNavbar1">
            
            <form class="navbar-form navbar-left" role="search">
              <div class="form-group"> </div>
			</form>
           
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
               
            <span class="glyphicon glyphicon-user"> Account</span></a>
                <ul class="dropdown-menu">
                  <li><a href="/logout.php">Logout</a></li>
                  <li><a href="#">Settings</a></li>
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
		<div class="container" align="center">
			<div class="el_kanji" id="el_kanji" align="center">
			
			<h1 id="kanji">
			<?php 
				$kanji = getRandomKanji();
				echo $kanji[0];
			?>
			</h1>
			
			<h1 id="english">	
				<?php 
				$english = $kanji[1];
			 	echo $english;
				?>
			</h1>
			</div>

 			<br><br>
 		 </div>
  
		<div class="row" align="center">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<button id="A" type="button" class="btn btn-lg btn-default customButton" value=""></button>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<button id="B" type="button" class="btn btn-lg btn-default customButton" value=""></button>
			</div>
			<br><br><br><br>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<button id="C" type="button" class="btn btn-lg btn-default customButton" value=""></button>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<button id="D" type="button" class="btn btn-lg btn-default customButton" value=""></button>
			</div>
			<br><br><br><br>

			<div class="col-lg-12">
				<div class="progress" style="background-color: grey">
					<div id="bar" class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:0%"></div>
				</div>             
			</div> 
		</div>
		<div class="row" align="center">

		 
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
   
<script src="KanjiQuiz.js"></script>   
</body>
</html>
