<?php
$nameErr = "";
$pwdErr="";
$repwdErr="";
$lnameErr="";
$rnoErr="";
$subErr="";
if(isset($_POST["Submit"])) {
    // Set form variables
    $name= checkInput($_POST["name"]);
    $lname= checkInput($_POST["lname"]);
    $rno= checkInput($_POST["rno"]);
    $sub= checkInput($_POST["sub"]);
    
    if(!preg_match("/^[A-Za-z]{3,20}$/", $name)) {
        $nameErr = '<div class="error">Enter Your valid First Name. 
        </div>';
    }
    if(!preg_match("/^[A-Za-z]{3,20}$/", $lname)) {
        $lnameErr = '<div class="error">Enter Your valid Last Name.
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
    <link rel="stylesheet" href="slogin.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />
    <title>Student Login</title>
    <style>
    .error {
color: red;
font-weight: 500;
font-size: 30px;
}
</style>
  </head>
  <body>
    <header>
      <a href="#"><img src="images/Logo-eAttendance.png" alt="logo" /></a>
      <h1>Student LogIn</h1>
    </header>
    <div class="details">
      <form method="POST">
        First Name:
        <input type="text" placeholder=" Enter First Name" name="name" value="<?php echo $name; ?>" />
        <?php echo $nameErr; ?>
        <br />
        Last Name:
        <input type="text" placeholder=" Enter Last Name" name="lname" value="<?php echo $lname; ?>"/>
        <?php echo $lnameErr; ?>

        <br />
        Roll No &nbsp; &nbsp; :
        <input type="number" placeholder="Enter Roll No." name="rno" require />

        <br />
        Sub Code &nbsp;:
        <input type="number" placeholder="Subject Code" name="sub" require/>

        <br />
        <input class="btn" type="submit" value="Get Result" name="Submit" />
      </form>
    </div>
  </body>
</html>
