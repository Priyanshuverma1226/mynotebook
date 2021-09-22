<?php
$hostname = 'localhost';
$username = 'root';


$password = '';
$database = 'mynotebook';
$conn = mysqli_connect($hostname, $username, $password, $database);


session_start();
// echo $_SESSION['email'];


$user=$_SESSION['email'];


$insert = false;

        if ($_SERVER['REQUEST_METHOD']=='POST') {
            # code...
            $title=$_POST['title'];
            $notes=$_POST['notes'];
            $su=1;
            
            // echo $title;
            // echo $notes;
            if ($conn) {
                // echo "connected";
                $query="INSERT INTO `notes` (`title`, `notes`,`user`) VALUES ('$title','$notes','$user')";
                $run=mysqli_query($conn,$query);
                if ($run) {
                    # code...
                    // echo "Sucess";
                        // $su=2;
                        $insert=true;
                }
                else{
                    // echo "noe";
                    $su=3;
                }
                # code...
            }
            else{
                echo "Not Connect";
            }
        }

        ?>
        

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>My NoteBook</title>
    <style>
        /* .text-center{
            text-align: center;
        } */
    </style>
  </head>
  <body>
      <!-- Navbar Design -->
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
        <div class="container-fluid">
          <a class="navbar-brand" href="#">My NoteBook</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="table.php">My Notes</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Feedback</a>
              </li>
              
              
            </ul>
            <form class="d-flex">
            <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    <?php
    echo "Welcome ".$user;
    ?>

  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item" href="logout.php">Logout</a></li>

  </ul>
</div>
         
            </form>
          </div>
        </div>
      </nav>
<?php
if ($insert) {
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Notice !</strong> Insert SucessFully .
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
?>







      <div class="container">
          <img src="img/head.svg" style="  display: block;
          margin-left: auto;
          margin-right: auto;
          width: 50%; 
          margin-top: 11px;" height="100"  alt="">




        <h1 style="text-align: center; font-family: Georgia, 'Times New Roman', Times, serif; color: #A82D8E; margin-top: 11px;" >My NoteBook</h1>

        <p style="text-align: center; font-family: Georgia, 'Times New Roman', Times, serif; color: #0a0409; margin-top: 3px;">(Save Your Important Notes  )</p>


        <hr>
        <form action="form.php" method="POST">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name=title placeholder="Title" required>
              </div>
              <div class="mb-3">
                <label for="text_area" class="form-label">Write Their Notes</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name= "notes"  required></textarea>
              </div>
              <button type="submit" class="btn  mx-2" style="background-color:#A82D8E; color: white;">Submit</button>

              
        </form>
        

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