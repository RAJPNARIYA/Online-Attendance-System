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
    <link rel="stylesheet" href="hstyle.css">
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
        <a href="dashboard.php">Dashboard</a>
        <a href="#">Profile</a>
        <a href="addstudent.php">Add Student</a>
        <a href="message.php"> feedbacks</a>
      </nav>

      <form method="post">

<input style="background-color: white; cursor: pointer; font-weight:600;"  type="submit" name="logout" value="LogOut">
</form>
    </header>
    
      <div class="content">
        <h1><?php echo "Welcome ". $_SESSION['t_name'];  ?></h1>

        <div class="margin">
          <?php
            $sql = "SELECT * FROM classes";
            $result = mysqli_query($con, $sql);
            
            if (mysqli_num_rows($result) > 0) {
              // output data of each row
              while($row2 = mysqli_fetch_assoc($result)) {
                ?>
                <button class="btn">
                    <h3>Subject Name:<?php echo $dbsubject=$row2['subjects']?><br>
                    Time:<?php echo $dbtime=$row2['timess']?><br>to<?php echo $dbtime=$row2['timess']?><br>
                    Date:<?php echo $dbdate=$row2['dates']?>
                  </h3>
                </button>
            <?php  
              }
            }
          ?>
          <button class="btn show-modals">
            <h3>Add <br />New<br />class</h3>
          </button>
          <div class="modals hiddens">
      <!-- <button class="close-modals">&times;</button> -->
      <h1>Add Class</h1>
      <form method="POST" action="addclass.php">
      <table style="margin-top: 50px; margin-left: auto; margin-right: auto;">
          <tr>
          <td>Subject name:</td>
          <td><input type="text" placeholder="Subject name" name="subject"></td>
          
         
          </tr>

          <tr>
          <td>Time:</td>
            <td><input type="time" name="times"> to <input type="time" name="end"></td>
            
          </tr>

          <tr>
          <td>Date:</td>
          <td><input type="date" name="dates"></td>
          </tr>

          
          
        </table>
        <button type="submit" style="background-color: blue; color:white; cursor: pointer; border-radius: 5px; ">Add</button>
       
      </form>
          </div>
    </div>
    <div class="overlays hiddens"></div>
          <table class="tables" cellspacing="5" border="2" style="margin-top: 50px; margin-left: auto; margin-right: auto;">
          <tr>
          <th><p style="margin-left: 20px;">Name</p></th>
          <th><p style="margin-left: 20px;">Last Name</p></th>
          <th><p style="margin-left: 20px;">Roll No.</p></th> 
          <th><p style="margin-left: 20px;">Subject Name</p></th>
          <th><p style="margin-left: 20px;">Department</p></th>
          <th><p style="margin-left: 20px;">Semester</p></th>
          <th><p style="margin-left: 20px;">Year</p></th>
          <th><p style="margin-left: 20px;">Action</p></th>

          </tr>
          <?php
            $sql = "SELECT * FROM student";
            $result = mysqli_query($con, $sql);
            
            if (mysqli_num_rows($result) > 0) {
              // output data of each row
              while($row1 = mysqli_fetch_assoc($result)) {
              ?>
                        <td><p style="margin-left: 20px;"><?php echo $dbnames=$row1['s_name']?></p></td>
                        <td><p style="margin-left: 20px;"><?php echo $dblnames=$row1['s_lname']?></p></td>
                        <td><p style="margin-left: 20px;"><?php echo $dbrnos=$row1['s_rno'];?></p></td>
                        <td><p style="margin-left: 20px;"><?php echo $dbsubs=$row1['sub']?></p></td>
                        <td><p style="margin-left: 20px;"><?php echo $dbdepts=$row1['dept']?></p></td>
                        <td><p style="margin-left: 20px;"><?php echo $dbsems=$row1['sem']?></p></td>
                        <td><p style="margin-left: 20px;"><?php echo $dbyears=$row1['s_year']?></p></td>
                        <td><p style="margin-left: 20px;"><button style="background-color: white; cursor: pointer; font-weight:500; color: red;" type="submit" name="submit"  class="delete_btn" id=<?php echo $row1['s_rno']?>>Delete</button></p> </td>
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
    <script src="script.js"></script>
  </body>
</html>