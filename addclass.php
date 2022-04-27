<?php
$con = mysqli_connect("localhost","wt","wt","wt");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySql:";
}
$query="INSERT INTO classes(subjects,timess,ends,dates) VALUES ('$_POST[subject]','$_POST[times]','$_POST[end]','$_POST[dates]')";
if(mysqli_query($con,$query)){
    echo "New Record Added";
    header("location: dashboard.php");
}else{
    echo "Faild";
}
?>