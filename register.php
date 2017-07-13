<html>
  <head lang="en">
     <meta charset="utf-8">
     <title>Register</title>
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
                <legend>Register an Account</legend>
                <table>
                   <tr>
          			<td>
                         <p>
                         <label>First Name</label><br/>
                            <input type="text" name="fName" size="25" class="required"/>
                         </p>
            			</td>
          			<td>
          			   <p>
                         <label>Last Name</label><br/>
                            <input type="text" name="title" size="25" class="required" />
                         </p>
          			 </td>
                   </tr>
          		 
          		 <tr>
                      <td colspan="2" >
          			<label>Username</label><br/>               
          				<input type="text" name="userName" size="25" class="required"/>
                      </td>
                   </tr>
          		 
          		 <tr>
                      <td>
                        <label>Email Address</label><br/>               
          				<input type="text" name="userEmail" size="25" class="required"/>   
                      </td>
                   </tr>
          		 
                   <tr>
                      <td> 
                         <p>	
                         <label>Enter Password</label><br/>               
                         <input type="text" name="passWord" size="25" class="required"/>
                         </p>
                      </td>
                      <td>
                         <p>	
                         <label>Confirm Password</label><br/>               
          				<input type="text" name="passWord" size="25" class="required"/>
                         </p>          
                      </td>
                   </tr>
          		 
          		 <tr>
          			<td>
          				<label>Enter You Skill Level</label><br/>
          				<input type="radio" name="skill" value="beginner" class="required"> Beginner
          				<input type="radio" name="skill" value="intermediate" class="required"> Intermediate
          				<input type="radio" name="skill" value="expert" class="required"> Expert
          			</td>
          		 </tr>
          		 
                   <tr>
                      <td colspan="2">
                         <div class="rectangle centered"> 
                            <input type="submit" class="rounded"> <input type="reset" value="Clear Form" class="rounded">  
                         </div
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
