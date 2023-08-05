<!DOCTYPE html>
<?php 
include 'conn.php';
include 'logincheck.php';
$EnameErr = $EdescriptionErr = $EdatetimeErr = $EdurationErr = $ElocationErr = $EtypeErr = $ElimitsErr = $em = "";
$Ename = $Edescription = $Edate = $Etime = $Elocation = $Etype = $Elimits = "";
$Euser = $_SESSION['id'];

if (isset($_POST['Create'])) {
    if (empty($_POST["event_name"])) {
        $EnameErr = "event name is required";
    } else {
        $Ename = $_POST['event_name'];
    }
    if (empty($_POST["event_description"])) {
        $EdescriptionErr = "event description is required";
    } else {
        $Edescription = $_POST['event_description'];
    }
    if (empty($_POST["event_datetime"])) {
        $EdatetimeErr = "event date is required";
    } else {
        $Edatetime = $_POST['event_datetime'];
    }
    if (empty($_POST["event_duration"])) {
        $EdurationErr = "event duration is required";
    } else {
        $Eduration = $_POST['event_duration'];
    }
    if (empty($_POST["event_location"])) {
        $ElocationErr = "event location is required";
    } else {
        $Elocation = $_POST['event_location'];
    }
    if (empty($_POST["event_type"])) {
        $EtypeErr = "event type is required";
    } else {
        $Etype = $_POST['event_type'];
    }
    if (empty($_POST["event_attendance_limit"])) {
        $ElimitsErr = "event attendance limit is required";
    } else {
        $Elimits = $_POST['event_attendance_limit'];
    }
    $status = "in progress";

    if (isset($_POST['Create']) && isset($_FILES['event_image'])) {
        include "conn.php";
        $img_name = $_FILES['event_image']['name'];
        $img_size = $_FILES['event_image']['size'];
        $tmp_name = $_FILES['event_image']['tmp_name'];
        $error = $_FILES['event_image']['error'];

        if ($error === 0) {
            if ($img_size > 99999000) {
                $em = "Sorry, your file is too large.";
            } else {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);

                $allowed_exs = array("jpg", "jpeg", "png");

                if (in_array($img_ex_lc, $allowed_exs)) {
                    $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                    $img_upload_path = 'uploads/' . $new_img_name;
                    move_uploaded_file($tmp_name, $img_upload_path);
                } else {
                    $em = "You can't upload files of this type";
                }
            }
        } else {
            $em = "Image is required";
        }
    }

    if (empty($EnameErr) && empty($EdateErr) && empty($EtypeErr) && empty($EtimeErr) && empty($EdescriptionErr) && empty($ElimitsErr) && empty($em)) {
$eventDescription = mysqli_real_escape_string($connect, $Edescription);
$query = "INSERT INTO `events`(`event_name`, `user_id`, `event_description`, `event_datetime`, `event_duration`, `event_location`, `event_type`, `event_attendance_limit`, `event_image`, `status`) VALUES ('$Ename', '$Euser', '$eventDescription', '$Edatetime', '$Eduration', '$Elocation', '$Etype', '$Elimits', '$new_img_name', '$status')";

$result = mysqli_query($connect, $query);

        if ($result) {
            $event_id = mysqli_insert_id($connect); // Get the last inserted event_id

            $sql1 = "INSERT INTO `attendees`(`a_user_id`, `a_event_id`) VALUES ('$Euser','$event_id')";
            $resultsql = mysqli_query($connect, $sql1);

            if ($resultsql) {
                header("location: home.php");
                exit;
            } else {
                echo 'Data not inserted into attendees table';
            }
        } else {
            echo 'Data not inserted into events table';
        }

        mysqli_close($connect);
    }
}
?> 




<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Create Event</title>
		    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

<style type="text/css">
  
body
{
  background-image: url('photo/event.png');
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
<?php include 'header.php' ?>
<div class="container">
	<div class="card " style="position: center; padding: 10px;">
<form class="row g-3" action="" method="post" enctype="multipart/form-data">
  <div class="logo-container"><img class="logo" src="photo/logo2.png"></div>
  <div class="col-md-4">
    <label for="event_name" class="form-label">Event Name</label>
    <input type="text" class="form-control" name="event_name">
    <span class="error"><?php echo $EnameErr;?></span>
  </div>
  <div class="col-md-4">
    <label for="event_datetime" class="form-label">Event Date</label>
    <input type="datetime-local" class="form-control" name="event_datetime" >
    <span class="error"><?php echo $EdatetimeErr;?></span>
  </div>
  <div class="col-md-4">
    <label for="event_duration" class="form-label">Event Duration</label>
    <select class="form-select" id="event_duration" name="event_duration">
    <option value="1-2 hours">1-2 hours</option>
    <option value="2-3 hours">2-3 hours</option>
    <option value="3-4 hours">3-4 hours</option>
</select>
<span class="error"><?php echo $EdurationErr;?></span>
  </div>
  <div class="col-md-4">
    <label for="event_attendance_limit" class="form-label">Event Attendance Limit</label>
    <input type="number" class="form-control" name="event_attendance_limit" >
    <span class="error"><?php echo $ElimitsErr;?></span>
  </div>
  <div class="col-md-4">
    <label for="event_image" class="form-label">Event Image</label>
    <input type="file" class="form-control" name="event_image">
    <span class="error"><?php echo $em;?></span>
  </div>
  <div class="col-md-4">
    <label for="event_location" class="form-label">Event Location</label>
    <input type="text" class="form-control" name="event_location">
    <span class="error"><?php echo $ElocationErr;?></span>
  </div>
  <div class="col-md-4">
    <label name="event_type" class="form-label">Event Type</label>
    <select class="form-select" name="event_type">
    <option>Charity</option>
    <option>Education Course</option>
    <option>Student meetup</option>
    <option>Workshops and Seminars</option>
    <option>Career Fairs</option>
    <option>Guest Lectures</option>
    <option>Conferences and Symposias</option>
    <option>Cultural and Diversity Events</option>
    <option>Sporting Events</option>
    <option>Health and Wellness Programs</option>
    <option>Leadership Development Programs</option>
    <option>Art Exhibitions and Performances</option>
    <option>Others</option>
</select>
<span class="error"><?php echo $EtypeErr;?></span>
  </div>
    <div class="col-md-8"> 
   <label for="floatingTextarea2">Event description</label>
  <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 50px" name="event_description"></textarea>
    <span class="error"><?php echo $EdescriptionErr;?></span>
  </div>
  <div class="col-12">
    <input class="btn" type="submit" name="Create" value="Create">
  </div>
</form>
  </div>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>
<?php include 'footer.php' ?>
</html>
