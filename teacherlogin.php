<?php
  $emailErr = "";
  $pwdErr="";
  if(isset($_POST["Submit"])) {
    $email= checkInput($_POST["email"]);
    $pwd= checkInput($_POST["pwd"]);
    if (!preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/", $email)){
        $emailErr = '<div class="error">
                Email format is not valid.
        </div>';
    }
    if(!preg_match("/^[A-Za-z0-9!@#$%^&*()_]{6,20}$/", $pwd)) {
        $pwdErr = '<div class="error">Enter valid password.
        </div>';
    }
}  
function checkInput($input) {
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />
    <link rel="stylesheet" href="slogin.css" />
    <title>Teacher Login</title>
    <style>
        .error {
    color: red;
    font-weight: 500;
    font-size: 20px;
}
    </style>
  </head>
  <body>
    <header>
        <a href="#"><img src="images/Logo-eAttendance.png" alt="logo" /></a>
        <h1>Teacher LogIn</h1>
      </header>
      <div class="details">
        <form method="POST" action="check.php">
          E-mail &nbsp;   :
          <input type="email" placeholder=" Enter email" name="email"   />
          <?php echo $emailErr; ?>
          <br />
          Password:
          <input type="password" placeholder=" ********" name="pwd"  />
          <?php echo $pwdErr; ?>
          <br />
        
          <p><a href="forgot.html">forgot password</a></p>
          <p>I don't have Account?<a href="teachersign.php">SignIn</a><br>
      <input class="btn" type="submit" value="LogIn" go="index.html" name="Submit" />
      <a href="index.html"><input class="btn" type="button" value="<< Back"/></a>
  </body>
</html>
