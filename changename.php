<?php

include 'logincheck.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the input values from the form
    $newFirstname = $_POST['firstname'];
    $newLastname = $_POST['lastname'];

        $id = $_SESSION['id'];

        // Assuming you have established a MySQL database connection
        include 'conn.php';

        // Update the records in the database
        if (!empty($newFirstname) && empty($newLastname)) {
            $query = "UPDATE attendance_info SET first_name = '$newFirstname'  WHERE id = $id";
        } elseif (empty($newFirstname) && !empty($newLastname)) {
            $query = "UPDATE attendance_info SET last_name = '$newLastname' WHERE id = $id";
        } elseif (!empty($newFirstname) && !empty($newLastname)) {
            $query = "UPDATE attendance_info SET first_name = '$newFirstname', last_name = '$newLastname' WHERE id = $id";
        }

        $result = mysqli_query($connect, $query);

        // Check if the update was successful
        if ($result) {
            header('Location: profile.php');
            exit();
        } else {
            echo "Error updating records: " . mysqli_error($connect);
        }

        // Close the database connection
        mysqli_close($connect);
    
}
?>
<!doctype html>
<html lang="en">
<head>
    <title>My Profile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <style type="text/css">
body
{
  background-image: url('photo/register.png');
  background-size: cover;
  background-position: center;
  height: 100vh;
  width: 100%;
}

.card
{
  margin: 0px auto;  
  max-width:400px;
  background:#212121;
  padding: 40px;
  box-shadow: 0 0 30px black;
  margin-bottom: 100vh;
  margin-top: 60px;

}
.btn
{
  background-color: #0F9347;
  padding: 15px 15px;
  border-radius:30px ;
}
.btn:hover
{
  background-color: #2ad472;
}

label
{
  color: whitesmoke;
}
.logo-container
{
    padding: 20px;
}
.logo
{
  display: block;
  max-width: 100px;
  margin: 0px auto;
}
.error
{
 color:red ;
}
@media screen and (max-width: 1000px) {
.container{padding-top: 40px;}

}
  </style>
  <body>
    
            <div class="wrapper d-flex align-items-stretch" >
            <nav id="sidebar" style="  background-color: rgba(0, 0, 0, 0.8); backdrop-filter: blur(40px);">
                <div class="custom-menu" >
                    <button type="button" id="sidebarCollapse" class="btn btn-primary" >
              <i class="fa fa-bars"></i>
              <span class="sr-only">Toggle Menu</span>
            </button>
        </div>
                <div class="p-4">
              <div class="nav-logo" ><a class="navbar-brand" href="home.php" ><img src="photo/logo2.png" style="height: 200px;"></a></div>            
              <ul class="list-unstyled components mb-5">
              <li class="active">
                <a href="home.php"><span class="fa mr-3"></span> Home</a>
              </li>
              <li>
                  <a href="profile.php"><span class="fa mr-3"></span> My profile </a>
              </li>
              <li>
              <a href="myevents.php"><span class="fa mr-3"></span> My Events</a>
              </li>
            </ul>

            <div class="mb-5">
                        
                    </div>

            <div class="footer">
                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                          Copyright &copy;<script>document.write(new Date().getFullYear());</script>ZUJ-Events. All rights reserved.
                          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            </div>

          </div>
        </nav>

        <!-- Page Content  -->
<div class="container">
  <div class="card ">
        <h1 style="color: white;">Edit your User Name:</h1>

<form class="row g-3" action="#" method="post">
  <div class="col-md-12">
<?php 
                    $id=$_SESSION['id'];
                    include 'conn.php';
                    $sql = "SELECT * From attendance_info WHERE id=$id" ;
                    $Result = mysqli_query($connect, $sql);
                    if (mysqli_num_rows($Result) > 0) {
                    $Row = mysqli_fetch_assoc($Result); ?>

                    
                    <?php  
                }
                mysqli_close($connect);
                ?>
  </div>
                    <div class="col-12">
                      <label for="firstname" class="form-label">First name</label>
                      <input type="text" class="form-control" name="firstname" value="<?php echo $Row['first_name']?>" >
                   </div>                    
                    <div class="col-12">
                      <label for="lastname" class="form-label">Last name</label>
                      <input type="text" class="form-control" name="lastname" value="<?php echo $Row['last_name'];?>" >
                    </div>
        <div class="col-12">
            <input class="btn" type="submit" name="register" value="Save">
        </div>
</form>
  </div>
</div>


    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

  </body>
</html>