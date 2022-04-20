<?php
$nameErr = "";
$rnoErr = "";
$pwdErr="";
$lnameErr="";
if(isset($_POST["Submit"])) {
    // Set form variables
    $name= checkInput($_POST["name"]);
    $lname= checkInput($_POST["lname"]);
    $rno= checkInput($_POST["rno"]);
    
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
if(isset($_POST["Submit"])) {
$con = mysqli_connect("localhost","wt","wt","wt");
    if(mysqli_connect_errno()){
        echo "Failed to connect to MySql:" .mysqli_error();
    }
    $query="INSERT INTO student(s_name,s_lname,s_rno,sub,dept,sem,s_year) VALUES ('$_POST[name]','$_POST[lname]','$_POST[rno]','$_POST[sub]','$_POST[dept]','$_POST[sem]','$_POST[s_year]')";
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
<title>Add Studnent</title>
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
  <h1>Add Student</h1>
</header>
<div class="details">
  <form
    method="post"
    name="form"
  >
    Student Name:
    <input type="text" name="name" placeholder=" Enter First Name"/>
    <?php echo $nameErr; ?>
    <br />
    Student Last Name:
    <input type="text" name="lname" placeholder=" Enter Last Name"  />
    <?php echo $lnameErr; ?>

    <br />
    Roll No. &nbsp; &nbsp; &nbsp; &nbsp; :
    <input type="number" name="rno" placeholder="Roll No." />
<br>
Subject &nbsp; &nbsp; &nbsp; &nbsp; :
    <input type="text" name="sub" placeholder="Subject" />
<br>
Department:
    <input type="text" name="dept" placeholder="department" />
<br>
   
Semester:
    <input type="text" name="sem" placeholder="Semenster"  />
<br>

Year:
    <input type="text" name="s_year" placeholder="year"/>
<br>

    <input class="btn" type="submit" value="Add" name="Submit" />
    <a href="dashboard.php"><input class="btn" type="button" value="<< Back"/></a>
  </form>
</div>
</body>
</html>
