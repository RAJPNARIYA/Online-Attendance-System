
<?php
$nameErr = "";
$emailErr = "";
$pwdErr="";
$repwdErr="";
$lnameErr="";
if(isset($_POST["Submit"])) {
    // Set form variables
    $name= checkInput($_POST["name"]);
    $lname= checkInput($_POST["lname"]);
    $email= checkInput($_POST["email"]);
    $pwd= checkInput($_POST["password"]);
    $repwd= checkInput($_POST["repassword"]);
    
    if(!preg_match("/^[A-Za-z]{3,20}$/", $name)) {
        $nameErr = '<div class="error">Enter Your valid First Name. 
        </div>';
    }
    if(!preg_match("/^[A-Za-z]{3,20}$/", $lname)) {
        $lnameErr = '<div class="error">Enter Your valid Last Name.
        </div>';
    }
    if (!preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/", $email)){
        $emailErr = '<div class="error">
                Email format is not valid.
        </div>';
    }
    if(!preg_match("/^[A-Za-z0-9!@#$%^&*()_]{6,20}$/", $pwd)) {
        $pwdErr = '<div class="error">Enter valid password.
        </div>';
    }
    if(!preg_match("/^[A-Za-z0-9!@#$%^&*()_]{6,20}$/", $repwd)) {
        $repwdErr = '<div class="error">Enter valid re entered password.
        </div>';
    }

    if($pwd != $repwd) {
        $repwd=  '<div class="error">Password and re-password not matched
    </div>';
        }
}  
function checkInput($input) {
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}   
if(isset($_POST["Submit"])) {
$con = mysqli_connect("localhost","wt","wt","wt");
    if(mysqli_connect_errno()){
        echo "Failed to connect to MySql:";
    }
    $newpwd=md5($_POST['password']);
    $query="INSERT INTO teacher(t_name,t_lname,t_email,t_pwd) VALUES ('$_POST[name]','$_POST[lname]','$_POST[email]','$newpwd')";
    if(mysqli_query($con,$query)){
        echo "New Record Added";
    }else{
        echo "Faild";
    }
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
<title>Teacher Sign</title>
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
  <h1>Teacher Sign</h1>
</header>
<div class="details">
  <form
    method="post"
    name="form"
  >
    First Name:
    <input type="text" name="name" placeholder=" Enter First Name" "/>
    <?php echo $nameErr; ?>
    <br />
    Last Name:
    <input type="text" name="lname" placeholder=" Enter Last Name"  />
    <?php echo $lnameErr; ?>

    <br />
    Email &nbsp; &nbsp; &nbsp; &nbsp; :
    <input type="email" name="email" placeholder="Email"  />
    <?php echo $emailErr; ?>

    <br />
    Password &nbsp; &nbsp; :
    <input type="password" name="password" placeholder="Password" />
    <?php echo $pwdErr; ?>
    <br />
    Re-Password:
    <input
      type="password"
      name="repassword"
      placeholder="Confirm Password"
    />
    <?php echo $repwdErr; ?>

    <br />
    <input class="btn" type="submit" value="Sign In" name="Submit" />
    <a href="teacherlogin.php"><input class="btn" type="button" value="<< Back"/></a>
  </form>
</div>
</body>
</html>
