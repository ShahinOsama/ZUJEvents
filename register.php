<!DOCTYPE html>
<?php 
include 'conn.php';
$fname=$lname=$zujid=$email=$password=$phone=$uname=$collname="";
$fnameErr=$lnameErr=$zujidErr=$emailErr=$passwordErr=$phoneErr=$unameErr=$collnameErr="";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
if (empty($_POST["firstname"])) {
  $fnameErr = "First Name is required";
} else {
  $fname=$_POST['firstname'];
}

if (empty($_POST["lastname"])) {
  $lnameErr = "Last Name is required";
} else {
  $lname=$_POST['lastname'];
}

$zujid=$_POST['zuj-id'];



$email = $_POST["inputEmail"];

// Check if email is valid
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $emailErr = "Invalid email format";
} else {
    // Prepare and execute the query
    $stmt = $connect->prepare("SELECT * FROM attendance_info WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();

    // Fetch the result
    $result = $stmt->get_result();

    // Check if the email exists in the database
    if ($result->num_rows > 0) {
        $emailErr = "Email is already used";
    }

    // Close the statement
    $stmt->close();
}

if (empty($_POST["inputPassword"])) {
    $passwordErr = "Password is required";
} else {
    $password = $_POST["inputPassword"];
    // Perform password validation
    if (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/", $password)) {
        $passwordErr = "Password must be at least 8 characters long and contain at least one letter and one number";
    } else {
        $password = md5($password);
    }
}

if (empty($_POST["phonenumber"])) {
    $phoneErr = "Phone Number is required";
} else {
    $phone = $_POST['phonenumber'];
    // Perform phone number validation
    if (!preg_match("/^\d{10}$/", $phone)) {
        $phoneErr = "Phone Number should contain 10 numbers";
    }
}
$uname=$_POST['University'];
$collname=$_POST['College'];

if (empty($fnameErr) && empty($lnameErr) && empty($phoneErr) && empty($emailErr) && empty($passwordErr))
{
$query = "INSERT INTO `attendance_info`(`id`, `first_name`, `last_name`, `zuj_id`, `email`, `password`, `phone_number`, `university_name`, `college_name`) VALUES ('[value-1]','$fname','$lname','$zujid','$email','$password','$phone','$uname','$collname')";





$result= mysqli_query($connect,$query);

if ($result) 
  {
  header("Location:login.php");
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
	<title>Register</title>
		    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

<style type="text/css">
  
body
{
  background-image: url('photo/register.png');
  background-size: cover;
  background-position: center;
  height: 100vh;
  margin-top: 120px;
}

.card
{
  padding: 50px; 
  margin: 120px auto;
  box-shadow: 0 0 30px black;
  border-radius: 30px;
  background-color: #212121;
  backdrop-filter: blur(20px);
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

</style>

</head>
<body >
<div class="container">
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
    <label for="firstname" class="form-label">First name</label>
    <input type="text" class="form-control" name="firstname" >
    <span class="error"><?php echo $fnameErr;?></span>
  </div>
  <div class="col-md-4">
    <label for="lastname" class="form-label">Last name</label>
    <input type="text" class="form-control" name="lastname" >
    <span class="error"><?php echo $lnameErr;?></span>
  </div>
  <div class="col-md-4">
    <label for="phonenumber" class="form-label">Phone Number</label>
    <input type="text" class="form-control" name="phonenumber" >
    <span class="error"><?php echo $phoneErr;?></span>
  </div>
  <div class="col-md-4">
    <label for="zuj-id" class="form-label">Zuj ID</label>
    <input type="text" class="form-control" name="zuj-id" placeholder="Optional">
  </div>
  <div class="col-md-4">
    <label for="University" class="form-label">University</label>
    <select name="University" class="form-select" >
      <option selected>Al zaytoonah university of jordan</option>
      <option>University of Jordan</option>
      <option>Yarmouk University</option>
      <option>Muta Universityn</option>
      <option>University of Science and Technology of Jordan</option>
      <option>The Hashemite University</option>
      <option>Al al-Bayt University</option>
      <option>Balqa Applied University</option>
      <option>Al-Hussein Bin Talal University</option>
      <option>Tafila Technical University</option>
      <option>German Jordanian University</option>
      <option>Amman Arab University</option>
      <option>Middle East University</option>
      <option>University wall</option>
      <option>Amman Private University Private</option>
      <option>Applied Science Private University</option>
      <option>Philadelphia Private University</option>
      <option>Isra University</option>
      <option>Petra University</option>
      <option>Al Zarqa'a University</option>
      <option>Irbid Private University Eligibility</option>
      <option>Jerash University</option>
      <option>Princess Sumaya University for Technology</option>
      <option>Other..</option>

    </select>
  </div>
  <div class="col-md-4">
    <label name="College" class="form-label">Academic faculties</label>
    <input type="text" class="form-control" name="College">
    <span class="error"><?php echo $collnameErr;?></span>
  </div>
  <div class="col-12">
      <label class="form-check-label" for="gridCheck" style="font-size:15px; color: grey;">
        By signing up you Agree to receive emails notifications
      </label>
  </div>
  <div class="col-12">
    <input class="btn"  type="submit" name="register" value="SignUp"> 
    <a class ="return" href="login.php" >Login?</a>
  </div>

</form>
  </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>
<?php include 'footer.php'; ?>
</html>