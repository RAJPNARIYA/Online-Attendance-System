<?php


    $con = mysqli_connect("localhost","wt","wt","wt");
    $pwd = $_POST['pwd'];
    $email=$_POST["email"];
        if(mysqli_connect_errno()){
            echo "Failed to connect to MySql:" .mysqli_error();
        }
        $query="SELECT * from teacher where t_email='$email'";
        
        $result=mysqli_query($con,$query);
      while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
        $dbpwd = $row['t_pwd'];
        $t_name=$row['t_name'];
        
      }
      if(md5($pwd)==$dbpwd){
        header("Location: dashboard.php");
        session_start();
        $_SESSION['t_name']=$t_name;
        echo "Password match";
      }
      else{
        header("Location: teacherlogin.php");
        echo "No match";
      }
    
?>