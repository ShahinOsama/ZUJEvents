<?php

include 'logincheck.php';


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
    <div style="text-align: center; margin: 0 auto; padding: 10px;">
    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="white" class="bi bi-person-circle" viewBox="0 0 16 16">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
</svg></div>
        <h1 style="color: white; text-align: center; margin: 0 auto;">My Profile</h1>
        <br>

<form class="row g-3" action="#" method="post">
  <div class="col-md-12">
<?php 
                    $id=$_SESSION['id'];
                    include 'conn.php';
                    $sql = "SELECT * From attendance_info WHERE id=$id" ;
                    $Result = mysqli_query($connect, $sql);
                    if (mysqli_num_rows($Result) > 0) {
                    $Row = mysqli_fetch_assoc($Result); ?>

                    <label for="email">Email:</label>
                    <?php echo '<h5 style="color:gray;">'.$Row['email'].'</h5>'; 
                }
                mysqli_close($connect);
                ?>
  </div>
                    <div class="col-12">
                      <label for="firstname" class="form-label">User Name:</label>
                      <br>
                    </div> 
                    <div class="col-6">
              <h4 style="color: white;"><?php echo $Row['first_name']?> <?php echo $Row['last_name']?></h4>
                    </div>
                      <div class="col-1"><a href="Changename.php"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil" viewBox="0 0 20 20">
  <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
</svg></a></div> 
                                       
        <div class="col-12">
            <a for="Password" class="form-label" href="changepass.php">Change your Password?</a>
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