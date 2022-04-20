<?php

session_start();
  $con = mysqli_connect("localhost","wt","wt","wt");
  if(mysqli_connect_errno()){
    echo "Failed to connect to MySql:" .mysqli_error();
}
$rno="";
$rno=$_SESSION['s_rno'];
$query="SELECT * from student where s_rno=$rno";

$result=mysqli_query($con,$query);
$dbrno='';
while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
$dbrno = $row['s_rno'];
$dbname=$row['s_name'];
$dblname=$row['s_lname'];
$dbdept=$row['dept'];
$dbyear=$row['s_year'];
$dbsem=$row['sem'];
$dbsub=$row['sub'];
}


if(!isset($_SESSION['s_name']))
{
header('Location: studentlogin.php');
}
if(isset($_POST['logout']))
{
session_destroy();
header('Location: studentlogin.php');
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
    <link rel="stylesheet" href="attendamce.css" />
    <link rel="stylesheet" href="style.css" />

    <title>Attendance</title>
  </head>
  <body>
    <header>
      <div id="menu-bars" class="fas fa-bars"></div>
      <a href="#" class="logo"
        ><img src="images/Logo-eAttendance.png" alt="logo"
      /></a>

      
        <i class="fas fa-sing-out"></i>
        <form method="post">

          <input class="show-modals" type="submit" name="logout" value="LogOut">
        </form>
    </header>


    <br />
    <div class="b-skills">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="skill-item center-block">
              <div class="chart-container">
                <div class="chart" data-percent="70" data-bar-color="#23afe3">
                  <span class="percent" data-after="%">92</span>
                </div>
              </div>

              <p>Attendance</p>
            </div>
          </div>
          <div class="details">
            <table>
              <tr>
                <td>Student Name:&nbsp;</td>
                <td><?php echo $dbname. " " .$dblname ?></td>
              </tr>
              <tr>
                <td>Enrollment No.:</td>
                <td><?php echo $dbrno?></td>
              </tr>
              <tr>
                <td>Subject:</td>
                <td><?php echo $dbsub  ?></td>
              </tr>
              <tr>
                <td>Department:</td>
                <td><?php echo $dbdept  ?></td>
              </tr>
              <tr>
                <td>Semester:</td>
                <td><?php echo $dbsem  ?><sup>th</sup></td>
              </tr>
              <tr>
                <td>Year:</td>
                <td><?php echo $dbyear  ?></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
    <script
      src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
      integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
      integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
      integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
      crossorigin="anonymous"
    ></script>
    <script src="plugins/jquery-2.2.4.min.js"></script>
    <script src="plugins/jquery.appear.min.js"></script>
    <script src="plugins/jquery.easypiechart.min.js"></script>
    <script>
      "use strict";

      var $window = $(window);

      function run() {
        var fName = arguments[0],
          aArgs = Array.prototype.slice.call(arguments, 1);
        try {
          fName.apply(window, aArgs);
        } catch (err) {}
      }

      /* chart
================================================== */
      function _chart() {
        $(".b-skills").appear(function () {
          setTimeout(function () {
            $(".chart").easyPieChart({
              easing: "easeOutElastic",
              delay: 3000,
              barColor: "#369670",
              trackColor: "#fff",
              scaleColor: false,
              lineWidth: 21,
              trackWidth: 21,
              size: 250,
              lineCap: "round",
              onStep: function (from, to, percent) {
                this.el.children[0].innerHTML = Math.round(percent);
              },
            });
          }, 150);
        });
      }

      $(document).ready(function () {
        run(_chart);
      });
    </script>
  </body>
</html>
