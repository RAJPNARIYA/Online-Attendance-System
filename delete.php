
<?php
$id=$_POST['id'];
echo $id;
$con = mysqli_connect("localhost","wt","wt","wt");
    if(mysqli_connect_errno()){
        echo "Failed to connect to MySql:" ;
    }
    $query="DELETE From student where s_rno=$id";
    if(mysqli_query($con,$query)){
        echo "Data Deleted";
    }else{
        echo "Faild";
    }

?>