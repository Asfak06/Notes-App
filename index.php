<?php
session_start();
include('connection.php');
include('logout.php');
include('remember.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Document</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/bootstrap.css">
  <style>

.jum{
 margin-top:9vh;
 height:100vh;
 display:flex;
 align-items: center;
 justify-content:center;
}
  </style>

<script src="js/jquery.min.js" ></script>  


  </head>

  <body>
   <nav  role="navigation" class="navbar navbar-dark bg-dark navbar-expand-md fixed-top">
     <div class="container-fluid">
         <a href="" class="navbar-brand mb-1 border-bottom border-info">Online Notes</a>
         <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse">
           <span class="navbar-toggler-icon"></span>
         </button>

       <div class="collapse navbar-collapse" id="navbarCollapse">
         <ul class="navbar-nav">
           <li class="nav-item active"><a class="nav-link" href="#">Home</a></li>
           <li class="nav-item"><a class="nav-link" href="#">Help</a></li>
           <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
         </ul>

         <ul class="navbar-nav ml-auto">
           <li class="nav-item active text-center"><a class="nav-link border-left border-right rounded border-alert-dark " href="#loginModal"data-toggle="modal">Log In</a></li>
         </ul>
       </div>
     </div>
   </nav>

  <div class="jum text-center alert-dark">
   <button class=" btn border-dark rounded w-25" data-toggle="modal" data-target="#signupModal"><b>Sign up</b></button> 
  </div>

<!-- sign up form -->
<form action="post" id="signupForm">
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sign Up Here</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="signupmessage"></div>
        <div class="form-group">
          <label for="username" class="sr-only">user name :</label>
          <input class="form-control" type="text" id="username" name="username" placeholder="Username" maxlength="30">
        </div>
        <div class="form-group">
          <label for="email" class="sr-only">Email :</label>
          <input class="form-control" type="email" id="email" name="email" placeholder="Email Adress" maxlength="50">
        </div>
        <div class="form-group">
          <label for="password" class="sr-only">password :</label>
          <input class="form-control" type="password" id="password" name="password" placeholder="Choose a password" maxlength="30">
        </div>
        <div class="form-group">
          <label for="password" class="sr-only">Confirm password :</label>
          <input class="form-control" type="password" id="password2" name="password2" placeholder="Confirm password" maxlength="30">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class=" btn border-danger rounded " data-dismiss="modal">Cancel</button>
        <input name="signup" type="submit" value="Sign up" class=" btn border-dark rounded ">
      </div>
    </div>
  </div>
</div>
</form>

<!-- login form -->
<form action="post" id="loginform">
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Login Here</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="loginmessage"></div>
        <div class="form-group">
          <label for="loginemail" class="sr-only">Email :</label>
          <input class="form-control" type="email" id="loginemail" name="loginemail" placeholder="Email" maxlength="50">
        </div>
        <div class="form-group">
          <label for="loginpassword" class="sr-only">password :</label>
          <input class="form-control" type="password" id="loginpassword" name="loginpassword" placeholder="password" maxlength="30">
        </div>
        <div class="checkbox">
          <label>
            <input  type="checkbox" name="rememberme" id="rememberme">
            Remember me
          </label>
          <a href="#" data-dismiss="modal" data-target="#forgotpasswardModal" data-toggle="modal" class="float-right">Forgot password?</a>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="mr-auto btn border-dark rounded " data-dismiss="modal" data-target="#signupModal" data-toggle="modal">Register</button>       
        <input  name="login" type="submit" value="Login" class="btn border-dark rounded ">
      </div>
    </div>
  </div>
</div>
</form>

<!-- Forgot form -->
<form action="post" id="forgotpasswordform">
<div class="modal fade" id="forgotpasswardModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Forgot passord? Enter your email address.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="forgotpasswordmessage"></div>
        <div class="form-group">
          <label for="forgotemail" class="sr-only">Email :</label>
          <input class="form-control" type="email" id="forgotemail" name="forgotemail" placeholder="Email" maxlength="50">
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="mr-auto btn border-dark rounded " data-dismiss="modal" data-target="#signupModal" data-toggle="modal">Register</button>       
        <input  name="forgotpassward" type="submit" value="Submit" class="btn border-dark rounded ">
      </div>
    </div>
  </div>
</div>
</form>

  <div class="footer bg-dark p-2">
    <div class="container p-3 text-secondary text-justify">
      <p>&copy;orem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio molestiae laudantium nulla et similique, reprehenderit perferendis tempora 2018-<?php $today= date("Y"); echo $today; ?></p>
    </div>
  </div>

  </body>


  <script src="js/bootstrap.min.js" ></script>  

  <script src="js/index.js" ></script>  


</html>