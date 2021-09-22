<?php
$su = false;
$hostname = 'localhost';
$username = 'root';


$password = '';
$database = 'mynotebook';
$conn = mysqli_connect($hostname, $username, $password, $database);
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

  <title>Login</title>
</head>


<body>






  <!-- modals -->
  <!-- Login -->
  <!-- Button trigger modal -->


  <!-- Modal -->
  <!-- Button trigger modal -->


  <!-- Modal -->
  <div class="modal fade" id="login" tabindex="-1" aria-labelledby="login" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel" style="color: #A82D8E;">Login</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="login.php" method="POST">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="email" class="form-control" id="l_email" name="l_email" aria-describedby="emailHelp">

            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" class="form-control" id="l_password" name="l_password">
            </div>

            <button type="submit" class="btn btn-primary" name="l" value="l" style="background-color:#A82D8E; color: white;">Submit</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" style="background-color:black; color:#A82D8E;" data-bs-dismiss="modal">Close</button>

        </div>
      </div>
    </div>
  </div>






  <!-- Button trigger modal -->


  <!-- Modal -->
  <div class="modal fade" id="signup" tabindex="-1" aria-labelledby="signup" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel" style="color: #A82D8E;">Sign Up</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="login.php" method="POST">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="email" class="form-control" id="l_email" name="s_email" aria-describedby="emailHelp">

            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" class="form-control" name="s_password" id="s_password">
            </div>

            <button type="submit" class="btn btn-primary" name='s' value="s" style="background-color:#A82D8E; color: white;">Submit</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

        </div>
      </div>
    </div>
  </div>




  <?php

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (!empty($_POST['s'])) {



      $email = $_POST['s_email'];
      $password = $_POST['s_password'];

      // Registration 
      $query = "INSERT INTO `user` (`email`, `password`) VALUES ('$email', '$password')";
      $run = mysqli_query($conn, $query);
      if ($run) {
        # code...
        $su = true;
      } else {
        echo "not ";
      }
    }





    if (!empty($_POST['l'])) {

      // echo "Work";


      $email = $_POST['l_email'];
      $password = $_POST['l_password'];
      // echo $email;

      // Registration 
      $query = "Select * from user where email='$email'";

      $result = mysqli_query($conn, $query);
      // echo var_dump($result);
      $num = mysqli_num_rows($result);

      if ($num == 1) {
        while ($row = mysqli_fetch_assoc($result)) {
          echo "done1";
          if ($password== $row['password']) {
            echo "done";
            session_start();
            $_SESSION['email']=$email;
            header("Location: form.php", TRUE, 301);
          }
        }
      }
    }
  }




  ?>





  <?php



  if ($su) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Notice</strong> Account Create SucessFully
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }
  ?>



















  <div class="container">
    <div class="container">
      <img src="img/login.svg" style="  display: block;
          margin-left: auto;
          margin-right: auto;
          width: 50%; 
          margin-top: 11px;" height="100" alt="">




      <h1 style="text-align: center; font-family: Georgia, 'Times New Roman', Times, serif; color: #A82D8E; margin-top: 11px;">My NoteBook</h1>

      <p style="text-align: center; font-family: Georgia, 'Times New Roman', Times, serif; color: #0a0409; margin-top: 3px;">(One NoteBook Helps To Save Notes)</p>
      <hr>
      <center>
        <div class="row">
          <div class="col">
            <div class="card" style="width: 18rem;">
              <img src="img/sign.svg" class="card-img-top" style="margin-top: 11px;" height=120 alt="...">
              <div class="card-body">
                <h5 class="card-title">Sign Up </h5>
                <p class="card-text">If you are new user please click here</p>
                <a href="#" class="btn" style="background-color:#A82D8E; color: white;" data-bs-toggle="modal" data-bs-target="#signup">Sign Up</a>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card" style="width: 18rem; border: radius 10px;">
              <img src="img/log.svg" class="card-img-top" style="margin-top: 11px;" height=120 alt="...">
              <div class="card-body">
                <h5 class="card-title">Login</h5>
                <p class="card-text">Already user please click here</p>
                <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#login" style="background-color:#A82D8E; color: white;">Login</a>
              </div>
            </div>

          </div>
        </div>

      </center>
    </div>





































    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->
</body>

</html>