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

$con = mysqli_connect("localhost","wt","wt","wt");
  if(mysqli_connect_errno()){
    echo "Failed to connect to MySql:" .mysqli_error();
}
//$rno="";
//$rno=$_SESSION['s_rno'];
$query="SELECT * from student where s_rno=68";

$result=mysqli_query($con,$query);
$dbrno='';
while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
$dbrno = $row['s_rno'];
$dbname=$row['s_name'];
$dblname=$row['s_lname'];
$dbsub=$row['sub'];
$dbdept=$row['dept'];
$dbyear=$row['s_year'];
$dbsem=$row['sem'];
}


if(isset($_POST["Submit"])) {
$con = mysqli_connect("localhost","wt","wt","wt");
    if(mysqli_connect_errno()){
        echo "Failed to connect to MySql:" .mysqli_error();
    }
    $query="UPDATE student SET s_name='$_POST[name]',s_lname='$_POST[lname]',sub='$_POST[sub]',dept='$_POST[dept]',sem='$_POST[sem]',s_year='$_POST[s_year]' where s_rno=68";
    if(mysqli_query($con,$query)){
        echo "Data Updated";
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
<title>Update Data</title>
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
  <h1>Update Student</h1>
</header>
<div class="details">
  <form
    method="post"
    name="form"
  >
    Student Name:
    <input type="text" name="name" placeholder=" Enter First Name" value="<?php echo $dbname  ?>"/>
    <?php echo $nameErr; ?>
    <br />
    Student Last Name:
    <input type="text" name="lname" placeholder=" Enter Last Name" value="<?php echo $dblname  ?>" />
    <?php echo $lnameErr; ?>

    <br />
    Roll No. &nbsp; &nbsp; &nbsp; &nbsp; :
    <input type="number" name="rno" placeholder="Roll No." value="<?php echo $dbrno  ?>" />
<br>
Subject &nbsp; &nbsp; &nbsp; &nbsp; :
    <input type="text" name="sub" placeholder="Subject" value="<?php echo $dbsub  ?>" />
<br>
Department:
    <input type="text" name="dept" placeholder="department" value="<?php echo $dbdept  ?>" />
<br>
   
Semester:
    <input type="text" name="sem" placeholder="Semenster" value="<?php echo $dbsem  ?>"  />
<br>

Year:
    <input type="text" name="s_year" placeholder="year" value="<?php echo $dbyear  ?>"/>
<br>

    <input class="btn" type="submit" value="Add" name="Submit" />
    <a href="dashboard.php"><input class="btn" type="button" value="<< Back"/></a>
  </form>
</div>
</body>
</html>
