
<?php
session_start();
$srno=$_SESSION['rnos'];
echo $srno;
$con = mysqli_connect("localhost","wt","wt","wt");
    if(mysqli_connect_errno()){
        echo "Failed to connect to MySql:" ;
    }
    $query="DELETE From student where s_rno=$srno";
    if(mysqli_query($con,$query)){
        echo "Data Deleted";
    }else{
        echo "Faild";
    }

?>