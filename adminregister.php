<!DOCTYPE html>
<?php 
include 'conn.php';
$name=$zujid=$email=$password=$faculty="";
$nameErr=$zujidErr=$emailErr=$passwordErr=$facultyErr="";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
if (empty($_POST["name"])) {
  $nameErr = "First Name is required";
} else {
  $name=$_POST['firstname'];
}

if (empty($_POST["zuj-id"])) {
  $zujidErr = "zuj-id is required";
} else {
  $zujid=$_POST['zuj-id'];
}

if (empty($_POST["inputEmail"])) {
  $emailErr = "Email is required";
} else {
$email =($_POST["inputEmail"]);
      // Check if email is valid
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
   $emailErr = "Invalid email format";
}
}

if (empty($_POST["inputPassword"])) {
    $passwordErr = "Password is required";
} else {
    $password = md5($_POST["inputPassword"]);
    // Perform password validation
    if (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/", $password)) {
        $passwordErr = "Password must be at least 8 characters long and contain at least one letter and one number";
    } else {
        $password = ($password);
    }
}
if (empty($_POST["faculty"])) {
  $facultyErr = "faculty is required";
} else {
  $faculty=$_POST['faculty'];
}



if (empty($nameErr) && empty($zujidErr) && empty($facultyErr) && empty($emailErr) && empty($passwordErr))
{
$query = "INSERT INTO `admin`( `name`, `zuj_id`, `email`, `password`, `faculty`) VALUES ('$name','$zujid','$email','$password','$faculty')";





$result= mysqli_query($connect,$query);

if ($result) 
  {
  header("Location:adminlogin.php");
  }else {  echo "data not inserted"; }

  
  mysqli_close($connect);
  
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
}
}


 ?>



<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

<style type="text/css">
  

.error 
{
  color: red;
}  
body
{
padding: 50px; 
margin: 120px auto;  
width:55%;
background-image: url("photo/duotone.png");
ackground-repeat: no-repeat;
background-size: cover;

}

.card
{
  box-shadow: 0 0 30px black;
  border-radius: 30px;
  background-color: #212121;
  backdrop-filter: blur(20px);
}
.btn
{
  background-color: #0F9347;

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

    .alert {
      display: none;
      position: fixed;
      z-index: 1;
      left: 50%;
      top: 50%;
      transform: translate(-50%, -50%);
      width: 400px;
      padding: 20px;
      background-color: #f44336;
      color: white;
      text-align: center;
      border-radius: 5px;
    }

    /* Styling for the close button */
    .close-btn {
      position: absolute;
      top: 10px;
      right: 10px;
      color: white;
      font-size: 20px;
      font-weight: bold;
      cursor: pointer;
    }
    .error
    {
      color:red ;
    }
</style>

</head>
<body class="container ">

  <div class="card " style="position: center; padding: 10px;">
<form class="row g-3" action="#" method="post">
  <div class="logo-container"><img class="logo" src="photo/logo2.png"></div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Email</label>
    <input type="email" class="form-control" name="inputEmail">
    <span class="error"><?php echo $emailErr;?></span>
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Password</label>
    <input type="password" class="form-control" name="inputPassword">
    <span class="error"><?php echo $passwordErr;?></span>
  </div>
  <div class="col-md-4">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" name="name" >
    <span class="error"><?php echo $nameErr;?></span>
  </div>
  <div class="col-md-4">
    <label for="zuj-id" class="form-label">Zuj ID</label>
    <input type="text" class="form-control" name="zuj-id">
    <span class="error"><?php echo $zujidErr;?></span>
  </div>
  
  <div class="col-md-4">
    <label for="faculty" class="form-label">Faculty</label>
    <input type="text" class="form-control" name="faculty">
    <span class="error"><?php echo $facultyErr;?></span>
  </div>
  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Remember me
      </label>
    </div>
  </div>
  <div class="col-12">
    <input class="btn" type="submit" name="register" value="SignUp">
  </div>
</form>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>
</html>