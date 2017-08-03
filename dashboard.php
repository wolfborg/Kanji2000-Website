<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Dashboard</title>

<link rel="stylesheet" href="css/bootstrap.min.css" media="screen">


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
            <a class="navbar-brand" href="#">Kanji-2000</a></div>
      <div class="collapse navbar-collapse" id="topFixedNavbar1">
          
           
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
               
            <span class="glyphicon glyphicon-user"> Account</span></a>
                <ul class="dropdown-menu">
                  <li><a href="/logout.php">Logout</a></li>
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
            <p>Welcome to Kanji 2000! Blah Blah Blah Blah Stuff </p>
	  </div>
	
		
	</div>
	
	<div class="row">
	  <button>Start Quiz</button>
	
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
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Settings</h4>
        </div>
        <div class="modal-body">
          <form method="post" action="register.php" id="register-form">
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
               <h4>Reset Progress</h4>
               <div class="progress col-sm-8 col-xs-8">
  <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
    60%
  </div>
</div>
<div class="col-sm-2 col-sm-offset-2 col-xs-2 col-xs-offset-1">
           	    <button type="button" class="btn btn-danger">Reset</button>
               </div>
              </div>
            </fieldset>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" type=submit class="btn btn-default" data-dismiss="modal">Save Changes</button>
        </div>
      </div>
    </div>
  </div>
   
</body>
</html>
