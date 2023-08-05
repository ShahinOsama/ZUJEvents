
<?php
session_start();
$email = $password = "";
$emailErr = $passwordErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Define your database credentials
    include 'conn.php';

    // Get the email and password entered by the user
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = $_POST["email"];
    }
    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $password = md5($_POST["password"]);
    }

    if (empty($emailErr) && empty($passwordErr)) {
        // Prepare a SQL statement to check if the email and password are correct
        $stmt = mysqli_prepare($connect, "SELECT id, first_name, user_status FROM attendance_info WHERE email = '$email' AND password = '$password'");
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        mysqli_stmt_bind_result($stmt, $id, $name, $user_status);

        if (mysqli_stmt_num_rows($stmt) == 1) {
            mysqli_stmt_fetch($stmt);

            if ($user_status == "blocked") {
                // Account is blocked
                ?>
                <div class="alert">
                    <span class="close-btn">&times;</span>
                    <h2>Error!</h2>
                    <p>Your account is blocked. Please contact support for assistance.</p>
                </div>
                <?php
            } else {
                // Account is active, create session and redirect to the dashboard
                $_SESSION["id"] = $id;
                $_SESSION["first_name"] = $name;
                header("location: home.php");
                exit;
            }
        } else {
            // Incorrect email or password
            ?>
            <div class="alert">
                <span class="close-btn">&times;</span>
                <h2>Error!</h2>
                <p>Incorrect Email or Password. Please check them and try again.</p>
            </div>
            <?php
        }

        // Close the statement
        mysqli_stmt_close($stmt);
        // Close the connection to the database
        mysqli_close($connect);
    }
}
?>

<script>
    // Get the alert elements
    var alert = document.querySelector('.alert');

    // Get the close button element
    var closeBtn = document.querySelector('.close-btn');

    // Show the alert when the page loads
    alert.style.display = 'block';

    // Close the alert when the close button is clicked
    closeBtn.addEventListener('click', function() {
        alert.style.display = 'none';
    });
</script>

 <!DOCTYPE html>
<html>
<head>
  <title>Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
		    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

<style type="text/css">
 
body
{
  background-image: url('photo/login1.png');
  background-size: cover;
  background-position: center;
  height: 100vh;
  width: 100%;
  background-repeat: no-repeat;
  background-color:#0C542B; 

  
}

.loginform * {
  box-sizing: border-box;
  font-family: sans-serif;
}
.loginform 
{
  border-radius:30% 70% 52% 48% / 54% 32% 68% 46% ;
  margin: 0px auto;  
  max-width:400px;
  background:#212121;
  padding: 40px;
  box-shadow: 0 0 30px black;
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
label
{
  color: white;
}
.btn
{
  background-color: #0F9347;
  border: none;
  color: white;
  text-decoration: none;
  display: inline-block;
  font-size: auto;
  border-radius: 10px;
  width: 80%;
  margin-top: 15px;
  margin-left: 15px;
}
.btn:hover
{
  background-color: #2ad472;
  border: none;
  color: white;
  text-decoration: none;
  display: inline-block;
  font-size: auto;
  border-radius: 10px;
  width: 80%;
  margin-top: 15px;
  margin-left: 15px;
}

.content
{
  padding: 30px;
}
.header
{
  text-align: center;
  font-size: 2em;
  color: whitesmoke;
}
.form-label
{
  margin-top: 5px;
}
.register
{
  margin-top: 15px;
   text-align: center;
}
.register-font
{
  color:whitesmoke;
  text-align: center;
  text-decoration: none;
  font-weight: bold;
  font-size: 0.9em;
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
    .login-container
    {
      margin-top:4vh;
      margin-bottom:40vh;
    }
@media screen and (max-width: 768px) {
 
.login-container
    {
      margin-top:4vh;
      margin-bottom:20vh;
    }
}
</style>
</head>
<body>
  <div class="login-container">
<form class="loginform" method="post" action="#" style="margin-bottom:50px;"> 
  <div class="logo-container"><img class="logo" src="photo/logo2.png"></div>
  <div class="content">
    <div class="header">Login</div>

    <label for="inputEmail4" class="form-label">Email</label>
    <input type="email" class="form-control" name="email">
        <span class="error"><?php echo $emailErr;?></span>
        <br>


    <label for="inputPassword4" class="form-label">Password</label>
    <input type="password" class="form-control" name="password">
        <span class="error"><?php echo $passwordErr;?></span>
        <br>


    <input class="btn" type="submit" name="login" value="login">
  <div class="register"><a class="register-font" href="register.php">SignUp?</a></div>
</div>
</form>
     </div>
 

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>
<?php include 'footer.php'; ?>
</html>