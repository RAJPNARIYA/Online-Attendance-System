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
    echo "Failed to connect to MySql:" .mysqli_error();
}
//$rno="";
//$rno=$_SESSION['s_rno'];
$query="SELECT * from student";

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
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
    <title>Dashboard</title>
    <link rel="stylesheet" href="dashboard.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  </head>
  <body>
    <header>
    <script>
        
    $(document).ready(function () {
    $('.delete_btn').click(function () {
                          let id = this.id;
                          //alert(id);  
                          
                            if(confirm('Are you sure you want to delete this record?')){
                                $.post('delete.php', {
                                    type: 'POST',  // http method
                                    data: { id: id },
                                    success: function (response) {
                                        location.reload();
                                    },
                                    error: function () {
                                        console.log("Error Occured")
                                    }
                                });
                            }
     });
  });</script>

      <div id="menu-bars" class="fas fa-bars"></div>
      <a href="#" class="logo"
        ><img src="images/Logo-eAttendance.png" alt="logo"
      /></a>

      <nav class="navbars">
        <a href="dashboard.html">Dashboard</a>
        <a href="#">Profile</a>
        <a href="#"> Statistics</a>
        <a href="addstudent.php">Add Student</a>
      </nav>

      <form method="post">

<input class="show-modals" type="submit" name="logout" value="LogOut">
</form>
    </header>
    
      <div class="content">
        <h1><?php echo "Welcome ". $_SESSION['t_name'];  ?></h1>

        <div class="margin">
          <button class="btn">
            <h3>Subject name:WP<br />Time:7:30 to 8:25<br />Date:22/02/2022</h3>
          </button>
          <button class="btn">
            <h3>Add <br />New<br />class</h3>
          </button>
          <table class="tables" cellspacing="5" border="2">
          <tr>
          <th>Name</th>
          <th>Last Name  </th>
          <th>Roll No  </th> 
          <th>Suject Name  </th>
          <th>Department  </th>
          <th>Semester  </th>
          <th>Year </th>

          </tr>
          <?php
            $sql = "SELECT * FROM student";
            $result = mysqli_query($con, $sql);
            
            if (mysqli_num_rows($result) > 0) {
              // output data of each row
              while($row1 = mysqli_fetch_assoc($result)) {
              ?>
                        <td><?php echo $dbnames=$row1['s_name']?></td>
                        <td><?php echo $dblnames=$row1['s_lname']?></td>
                        <td><?php echo $dbrnos=$row1['s_rno'];
                        $_SESSION['rnos']=$dbrnos;?></td>
                        <td><?php echo $dbsubs=$row1['sub']?></td>
                        <td><?php echo $dbdepts=$row1['dept']?></td>
                        <td><?php echo $dbsems=$row1['sem']?></td>
                        <td><?php echo $dbyears=$row1['s_year']?></td>
                        <td><button type="submit" name="submit"  class="delete_btn" id=<?php echo $row1['s_rno']?>>Delete</button> </td>
                      </tr>
            <?php  
              }
            } else {
              echo "No data found";
            }
          ?>
          <tr>
                        
    </table>
        </div>
       
      </div>

    

    </div>
  </body>
</html>