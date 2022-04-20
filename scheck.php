<?php

session_start();
    $con = mysqli_connect("localhost","wt","wt","wt");
    $s_rno=$_POST["rno"];
    $s_name=$_POST["name"];
        if(mysqli_connect_errno()){
            echo "Failed to connect to MySql:" .mysqli_error();
        }
        $query="SELECT * from student where s_rno='$s_rno'";
        
        $result=mysqli_query($con,$query);
        $dbrno='';
      while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
        $dbrno = $row['s_rno'];
        $s_name = $row['s_name'];
      }
      
      if($s_rno==$dbrno){
        //header("Location: dashboard.html");
        echo "rno match";
        session_start();
        $_SESSION['s_name']=$s_name;
        $_SESSION['s_rno']=$s_rno;
        header("Location: attendance.php"); 
      }
      else{
        //header("Location: teacherlogin.php");
        echo "rno not match";
      }
    
?>