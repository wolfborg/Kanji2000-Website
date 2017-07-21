<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Untitled Document</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<script src="http://code.jquery.com/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body style="padding-bottom: 70px">
<header>
  <nav class="navbar navbar-default">
   	<div class="container-fluid">
         	<div class="navbar-header">
            <a class="navbar-brand" href="#">Kanji-2000</a></div>
      <div class="collapse navbar-collapse" id="topFixedNavbar1">

           
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <span class="glyphicon glyphicon-remove-circle"></span> </a>     
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>

<div class="container" style="height: 90%">

<div class="row">
  
</div>

<div class="row">   
	<div class="jumbotron col-8 col-sm-offset-0 col-lg-4 col-lg-offset-4">
		<div class="container" align="center">
			<h1>KANJI HERE</h1>
 			<br><br>
 		</div>

		<div class="row" align="center">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<button id="A" type="button" class="btn btn-lg btn-default customButton">Cat</button>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<button id="B" type="button" class="btn btn-lg btn-default customButton">Dog</button>
			</div>
			<br><br><br><br>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<button id="C" type="button" class="btn btn-lg btn-default customButton">Jones</button>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<button id="D" type="button" class="btn btn-lg btn-default customButton">Ball</button>
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

<footer>
  <nav class="navbar navbar-default navbar-fixed-bottom">
	  <div class="container-fluid">
	    <div class="collapse navbar-collapse" id="bottomFixedNavbar1">
	  <ul class="nav navbar-nav navbar-left">
          <li><a href="#">Link</a></li>
          </ul>
<ul class="nav navbar-nav navbar-right">
          <li><a href="#" class="">Link</a></li>
          </ul>
        </div>
	    <!-- /.navbar-collapse -->
    </div>
	  <!-- /.container-fluid -->
  </nav>
</footer>
<script src="KanjiQuiz.js"></script>   

</body>
</html>