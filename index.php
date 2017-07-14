<?php
  session_start();
  if(isset($_SESSION['user_id'])) {
    header("location: dashboard.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Kanji2000</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <style>
  	  .img-center {
  		  padding-top: auto;
  		}
    </style>
  </head>

<body style="padding-top: 0px">  
  <header>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#topFixedNavbar1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span><span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Kanji-2000</a></div>

          <div class="collapse navbar-collapse" id="topFixedNavbar1"> 
            <form class="navbar-form navbar-left" role="search">
              <div class="form-group">
              </div>
            </form>
           
            <ul class="nav navbar-nav navbar-right">
              <li><a href="#">About</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                  Learn Kanji!<span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <li><a data-toggle="modal" href="#loginModal">Login</a></li>
                  <li><a data-toggle="modal" href="#registerModal">Register</a></li>
                </ul>
              </li>
            </ul>
          </div>

        </div>
      </div>
    </nav>
  </header>

  <main>
    <div class="container">
      <div class="row">
        <div class="jumbotron col-sm-8 col-sm-offset-0">
          <h1>Kanji 2000!</h1>
          <p>Welcome to Kanji 2000! Blah Blah Blah Blah Stuff </p>
        </div>
        <img class="col-sm-4 img-responsive img-center" src="Kanji.gif">
      </div>
    </div>
    <img class="col-xs-4 img-responsive hidden-sm" src="Kanji.gif">
    
    <div class="container">
      <div class="row">
        <div class="jumbotron col-sm-8 col-sm-offset-0">
          <h1>Learn Quick!</h1>
          <p>Insert Stuff Here!</p>
          <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#loginModal">Learn Now!</button>   
        </div>
      </div>
    </div>
  </main>

  <div id="loginModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Login</h4>
        </div>
        <div class="modal-body">
          <form method="post" action="login.php" id="login-form">
            <fieldset>
              <p><label>Username</label><br/><input type="text" name="username" size="25" class="required"/></p>
              <p><label>Password</label><br/><input type="password" name="password" size="25" class="required"/></p>
              <input type="submit" class="rounded" value="Log in"><br/><br/>
              <a href="#">Forgot Password</a><br/>
              <a data-toggle="modal" href="#registerModal">Register an Account</a><br/>
            </fieldset>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <div id="registerModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Register</h4>
        </div>
        <div class="modal-body">
          <form method="post" action="register.php" id="register-form">
            <fieldset>
              <label>First Name:</label> <input type="text" name="firstName" size="25" class="required"/><br/>
              <label>Last Name:</label> <input type="text" name="lastName" size="25" class="required" /><br/>
              <label>Username:</label> <input type="text" name="username" size="25" class="required"/><br/>
              <label>Email Address:</label> <input type="text" name="email" size="25" class="required"/><br/>
              <label>Confirm Email:</label> <input type="text" name="confirmEmail" size="25" class="required"/><br/>
              <label>Enter Password:</label> <input type="password" name="password" size="25" class="required"/><br/>
              <label>Confirm Password:</label> <input type="password" name="confirmPassword" size="25" class="required"/><br/>
              <label>Enter You Skill Level:</label>
                <input type="radio" name="skill" value="beginner" class="required"/> Beginner
                <input type="radio" name="skill" value="intermediate" class="required"/> Intermediate
                <input type="radio" name="skill" value="expert" class="required"/> Expert<br/><br/>
              <div class="rectangle centered"> 
                <input type="submit" class="rounded"/><tb/>&nbsp;&nbsp;&nbsp;<input type="reset" value="Clear Form" class="rounded"/>  
              </div>
            </fieldset>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  

  <footer class="footer">
    <div class="container">
      <p class="text-muted">Wentworth Institute of Technology</p>
    </div>
  </footer>
</body>
</html>