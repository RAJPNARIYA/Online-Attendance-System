<?php
if(isset($_POST['submit'])){
 $con = mysqli_connect("localhost","wt","wt","wt");
 if(mysqli_connect_errno()){
     echo "Failed to connect to MySql:";
 }
 $query="INSERT INTO feedback(uname,email,phone,msg) VALUES ('$_POST[name]','$_POST[u_email]','$_POST[u_phone]','$_POST[message]')";
 if(mysqli_query($con,$query)){
     echo "<h5>Query submited successfully.</h5>";
 }else{
     echo "Faild";
 }
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS -->

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
    <style>
      .card-deck {
        margin-top: 120px;
      }
      .card-title {
        text-align: center;
        font-weight: bolder;
        font-size: 5rem;
      }
      .card-text {
        text-align: center;
      }
    </style>

    <title>Contact Us</title>
  </head>
  <body>
    <header>
      <div id="menu-bars" class="fas fa-bars"></div>
      <a href="#" class="logo"
        ><img src="images/Logo-eAttendance.png" alt="logo"
      /></a>

      <nav class="navbars">
        <a href="index.html">Home</a>
        <a href="#">Contact Us</a>
      </nav>

      <button class="show-modals">
        <i class="fas fa-user" id="login-btn"></i> Login/Sign in
      </button>

      <div class="modals hiddens">
        <table>
          <tr>
            <th><a href="studentlogin.php">Student Login</a></th>
          </tr>
          <tr>
            <th><a href="teacherlogin.php">Teacher Login</a></th>
          </tr>
        </table>
      </div>
      <div class="overlays hiddens"></div>
    </header>

    <!-- Form -->

    <div class="card-deck">
      <div class="card">
        <img
          class="card-img-top"
          src="images/istockphoto-1053986724-612x612.jpg"
          height="500px"
          width="150px"
          alt="Contact Us"
        />
        <div class="card-body">
          <h1 class="card-title"><strong>Get In Touch</strong></h1>
          <p class="card-text"><b>Office hours are 9am to 5pm</b></p>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <h1 class="card-title">Query Form</h1>
          <p class="card-text">
            <form method="POST" name="form">
              <div class="form-group">
                  <label for="exampleFormControlInput1">User Name</label>
                  <input
                  type="text"
                  class="form-control"
                  id="exampleFormControlInput1"
                  placeholder="name"
                  name="name"
                  />
              </div>
              <div class="form-group">
                  <label for="exampleFormControlInput1">Email address</label>
                  <input
                  type="email"
                  class="form-control"
                  id="exampleFormControlInput1"
                  placeholder="name@example.com"
                  name="u_email"
                  />
              </div>
              <div class="form-group">
                  <label for="exampleFormControlSelect1">Phone</label>
                  <input
                  type="number"
                  class="form-control"
                  id="exampleFormControlInput1"
                  placeholder="phone"
                  name="u_phone"
                  />
              </div>
        
              <div class="form-group">
                  <label for="exampleFormControlTextarea1">Message</label>
                  <textarea
                  class="form-control"
                  id="exampleFormControlTextarea1"
                  rows="3"
                  name="message"
                  ></textarea>
              </div>
              <input type="submit" name="submit" class="btn btn-primary btn-lg"/>
            </form>
          </p>
          
        </div>
      </div>
    </div>

    <!-- footer -->
    <section class="footer">
      <div class="box-container">
        <div class="box">
          <h3>about us</h3>
          <p>
            Student attendance summary report provides attendance details at the
            level of individual students.
          </p>
        </div>

        <div class="box">
          <h3>quick links</h3>
          <a href="index.html">Home</a>
          <a href="services.html">Contact Us</a>
        </div>
        <div class="box">
          <h3>follow us</h3>
          <a href="#">facebook</a>
          <a href="#">instagram</a>
          <a href="#">twitter</a>
          <a href="#">linkedin</a>
        </div>

        <div class="box">
          <h3>Contact Details</h3>
          <p>
            <i class="fa fa-map-marker"></i> &nbsp; Rajkot, Gujarat<br /><br /><i
              class="fa fa-phone"
            ></i
            >&nbsp; +91 1234567890<br /><br />
            <i class="fa fa-envelope"></i>&nbsp; info@E-Attendance.gmail.com
          </p>
        </div>
      </div>
      <h1 class="credit">
        created by <span> Raj Nariya & Jay Makwana </span> | all rights
        reserved!
      </h1>
    </section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
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

    <script src="script.js"></script>
  </body>
</html>
