<html>
  <head lang="en">
     <meta charset="utf-8">
     <title>Login</title>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
     <link rel="stylesheet" href="css/style.css" media="screen">
     <script src="http://code.jquery.com/jquery.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script type="text/javascript" src="registration_validation.js"></script>
  </head>
  <body>
    <header>
      <div class="container">
        <nav class="navbar navbar-default">
          <ul class="nav navbar-nav">
            <li class="nav-item active"><a href="/">Home</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="register.php">Register</a></li>
          </ul>
        </nav>
      </div>
    </header>

    <main>
      <div class="container">
        <div class="row">
          <form method="get" action="" id="mainForm">
            <fieldset>
              <legend>Log In</legend>
              <table>
                    <tr>
           			<td>
                          <p>
                          <label>Username</label><br/>
                             <input type="text" name="username" size="25" class="required"/>
                          </p>
             			</td>
                    </tr>
           		 <tr>
           			<td>
           				<p>
           			      <label>Password</label><br/>
                             <input type="password" name="password" size="25" class="required" />
                          </p>
                    <tr>
                       <td colspan="2">
                              <input type="submit" class="rounded" value="Log in">   
                       </td>
                    </tr>
           		 
                    <tr>
                       <td>
           				<a href="insert forgot password link">Forgot Password</a>
                       </td>
                    </tr>
           		 <tr>
                       <td>
           				<a href="link to register account page">Register an Account</a>
                       </td>
                    </tr>
                 </table>
              </fieldset>
          </form>
        </div>
      </div>
    </main>
  </body>
</html>
