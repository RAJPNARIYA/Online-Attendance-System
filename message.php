<?php
session_start();
  if(!isset($_SESSION['t_name']))
  {
  header('Location: teacherlogin.php');
  }
  if(isset($_POST['logout']))
  {
  session_destroy();
  header('Location: teacherlogin.php');
  }

  $con = mysqli_connect("localhost","wt","wt","wt");
  if(mysqli_connect_errno()){
    echo "Failed to connect to MySql:";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="dashboard.css" />
    <title>Feedback</title>
</head>
<body>
<header>
      <div id="menu-bars" class="fas fa-bars"></div>
      <a href="#" class="logo"
        ><img src="images/Logo-eAttendance.png" alt="logo"
      /></a>

      <nav class="navbars">
        <a href="dashboard.php">Dashboard</a>
        <a href="#">Profile</a>
        <a href="addstudent.php">Add Student</a>
        <a href="message.php"> feedbacks</a>
      </nav>

      <form method="post">

<input class="show-modals" type="submit" name="logout" value="LogOut">
</form>
    </header>

    <table style="margin-top: 100px; margin-left: auto; margin-right: auto;" class="msg">
    <tr>
          <th><p style="margin-left: 20px;">Name</p></th>
          <th><p style="margin-left: 20px;">Email</p></th>
          <th><p style="margin-left: 20px;">Phone No. </p></th> 
          <th><p style="margin-left: 20px;">Message</p></th>
          </tr>
    <?php
            $sql = "SELECT * FROM feedback";
            $result = mysqli_query($con, $sql);
            
            if (mysqli_num_rows($result) > 0) {
              // output data of each row
              while($row = mysqli_fetch_assoc($result)) {
              ?>
                        <td><p style="margin-left: 20px;"><?php echo $dbname=$row['uname']?></p></td>
                        <td><p style="margin-left: 20px;"><?php echo $dbemail=$row['email']?></p></td>
                        <td><p style="margin-left: 20px;"><?php echo $dbphone=$row['phone'];?></p></td>
                        <td><p style="margin-left: 20px;"><?php echo $dbmsg=$row['msg']?></p></td>
                      </tr>
            <?php  
              }
            } else {
              echo "No data found";
            }
          ?>
    </table>
</body>
</html>