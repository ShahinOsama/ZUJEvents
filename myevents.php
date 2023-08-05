<?php 
include 'logincheck.php';

?>
<!doctype html>
<html lang="en">
  <head>
    <title>My Events</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/style.css">
  </head>
  <style>
    body
{
  background-image: url('photo/event.png');
  background-size: cover;
  background-position: center;
  height: 100vh;
}

    .card-slider {

      width: 100%;
      overflow-x: scroll;
      white-space: nowrap;
      margin-bottom: 10px;
      border-radius: 20px;
            background-color:rgba(255, 255, 255, 0.9); 
      backdrop-filter :blur(10px);
    }
    .card-slider .card {
      display: inline-block;
      width: 300px;
      margin: 10px;
    border-radius: 40px 5px;
    padding: 10px;
    background-color:rgba(0, 0, 0, 0.9); 
    color: white;

    }
        .card-slider .card h5 {
    color:white;

    }
    .aspect-ratio-wrapper {
    position: relative;
    width: 100%;
    height: 0;
    padding-top: 75%;
    border-radius: 40px 5px;
 /* Adjust this value to control the aspect ratio */
    }

    .aspect-ratio-img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 40px 5px;

    }
    .head-text h1
    {
      margin-left: 30px;
    }
    .head-text
    {
      background-color:rgba(255, 255, 255, 0.9); 
      backdrop-filter :blur(10px);
      border-radius: 30px;
    }
    .btn 
    {
        background-color:#0F9347; 
    }
    @media (max-width: 576px) {
      .card-slider .card {
      display: inline-block;
      width: 250px;
      margin: 10px;
    border-radius: 40px 5px;
    padding: 10px;
    }
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

                <div class="container" style="padding-top: 70px;">
    <div class="head-text"><h1>Accepted events</h1></div> 
    <div class="card-slider">
<?php
      include 'conn.php';
      $id = $_SESSION['id'];

      // Fetch events from the database
      $acceptedEventsQuery = "SELECT * FROM events WHERE user_id = $id AND status = 'accepted'";
      $acceptedEventsResult = $connect->query($acceptedEventsQuery);

      // Display accepted events in the slider
      if ($acceptedEventsResult->num_rows > 0) {
        
        while ($row = $acceptedEventsResult->fetch_assoc()) {
          $eventName = $row['event_name'];
          $eventDescription = $row['event_location'];
          $eventDatetime = $row['event_datetime'];

          echo '<div class="card accepted" style="margin:10px;">';
          echo '<div class="aspect-ratio-wrapper">';
          echo '<img src="uploads/' . $row['event_image'] . '" class="card-img-top aspect-ratio-img" alt="Event Image">';
          echo '</div>';
          echo '<div class="card-body">';
          echo '<h5 class="card-title">' . $eventName . '</h5>';
          echo '<p class="card-text">' . $eventDescription . '</p>';
          echo '<p class="card-text">' . $eventDatetime . '</p>';
          echo '<a href="Selectedevent.php?key='.$row['event_id'].'" class="btn">More Info</a>';
          echo '</div>';
          echo '</div>';
        }
        
      } else {
        echo '<div class="card accepted" style="background-color:rgba(255, 255, 255, 0.2); ">';
        echo '<div class="aspect-ratio-wrapper" >';
        echo '<img src="photo/error.png" class="card-img-top aspect-ratio-img" alt="Event Image">';
        echo '</div>';          echo '<div class="card-body">';       
        echo '</div>';
        echo '<h5 class="card-title"></h5> <br>';
        echo '<p class="card-text"></p> <br>';
        echo '<p class="card-text"></p>';
        echo '</div>';      }
          echo '</div>';

      ?>
    <div class="head-text"><h1>Rejected events</h1></div> 
    <div class="card-slider">

      <?php
      include 'conn.php';
      $id = $_SESSION['id'];
      $rejectedEventsQuery = "SELECT * FROM events WHERE user_id = $id AND status = 'rejected'";
      $rejectedEventsResult = $connect->query($rejectedEventsQuery);

      // Display rejected events in the slider
      if ($rejectedEventsResult->num_rows > 0) {
        while ($row = $rejectedEventsResult->fetch_assoc()) {
          $eventName = $row['event_name'];
          $eventDescription = $row['event_location'];
          $eventDatetime = $row['event_datetime'];

          echo '<div class="card rejected">';
          echo '<div class="aspect-ratio-wrapper">';
          echo '<img src="uploads/' . $row['event_image'] . '" class="card-img-top aspect-ratio-img" alt="Event Image">';
          echo '</div>';          echo '<div class="card-body">';
          echo '<h5 class="card-title">' . $eventName . '</h5>';
          echo '<p class="card-text">' . $eventDescription . '</p>';
          echo '<p class="card-text">' . $eventDatetime . '</p>';
          echo '</div>';
          echo '</div>';
        }
      } else {
        echo '<div class="card rejected" style="background-color:rgba(255, 255, 255, 0.2); ">';
        echo '<div class="aspect-ratio-wrapper" >';
        echo '<img src="photo/error.png" class="card-img-top aspect-ratio-img" alt="Event Image">';
        echo '</div>';          echo '<div class="card-body">';       
        echo '</div>';
        echo '<h5 class="card-title"></h5> <br>';
        echo '<p class="card-text"></p> <br>';
        echo '<p class="card-text"></p>';
        echo '</div>';
      }
     echo '</div>';

      ?>
    <div class="head-text"><h1>Pending events</h1></div> 
    <div class="card-slider">

      <?php
      include 'conn.php';
      $id = $_SESSION['id'];

      // Fetch in-progress events from the database
      $inProgressEventsQuery = "SELECT * FROM events WHERE user_id = $id AND status = 'in progress'";
      $inProgressEventsResult = $connect->query($inProgressEventsQuery);

      // Display in-progress events in the slider
      if ($inProgressEventsResult->num_rows > 0) {
        while ($row = $inProgressEventsResult->fetch_assoc()) {
          $eventName = $row['event_name'];
          $eventDescription = $row['event_location'];
          $eventDatetime = $row['event_datetime'];

          echo '<div class="card in-progress">';
          echo '<div class="aspect-ratio-wrapper">';
          echo '<img src="uploads/' . $row['event_image'] . '" class="card-img-top aspect-ratio-img" alt="Event Image">';
          echo '</div>';          echo '<div class="card-body">';
          echo '<h5 class="card-title">' . $eventName . '</h5>';
          echo '<p class="card-text">' . $eventDescription . '</p>';
          echo '<p class="card-text">' . $eventDatetime . '</p>';
          echo '</div>';
          echo '</div>';
        }
        echo '</div>';
      } else {
        echo '<div class="card in-progress" style="background-color:rgba(255, 255, 255, 0.2); ">';
        echo '<div class="aspect-ratio-wrapper" >';
        echo '<img src="photo/error.png" class="card-img-top aspect-ratio-img" alt="Event Image">';
        echo '</div>';          echo '<div class="card-body">';       
        echo '</div>';
        echo '<h5 class="card-title"></h5> <br>';
        echo '<p class="card-text"></p> <br>';
        echo '<p class="card-text"></p>';
        echo '</div>';
      }echo '</div>';
?>
    <div class="head-text"><h1>Ended events</h1></div> 
    <div class="card-slider">

      <?php
      include 'conn.php';
      $id = $_SESSION['id'];
      // Fetch end events from the database
      $endEventsQuery = "SELECT * FROM events WHERE user_id = $id AND status = 'end'";
      $endEventsResult = $connect->query($endEventsQuery);

      // Display end events in the slider
      if ($endEventsResult->num_rows > 0) {
        while ($row = $endEventsResult->fetch_assoc()) {
          $eventName = $row['event_name'];
          $eventDescription = $row['event_location'];
          $eventDatetime = $row['event_datetime'];

          echo '<div class="card end">';
          echo '<div class="aspect-ratio-wrapper">';
          echo '<img src="uploads/' . $row['event_image'] . '" class="card-img-top aspect-ratio-img" alt="Event Image">';
          echo '</div>';          echo '<div class="card-body">';
          echo '<h5 class="card-title">' . $eventName . '</h5>';
          echo '<p class="card-text">' . $eventDescription . '</p>';
          echo '<p class="card-text">' . $eventDatetime . '</p>';
          echo '<a href="Selectedevent.php?key='.$row['event_id'].'" class="btn">More Info</a>';
          echo '</div>';
          echo '</div>';
        }
        
      } else {

        echo '<div class="card end" style="background-color:rgba(255, 255, 255, 0.2); ">';
        echo '<div class="aspect-ratio-wrapper" >';
        echo '<img src="photo/error.png" class="card-img-top aspect-ratio-img" alt="Event Image">';
        echo '</div>';          echo '<div class="card-body">';       
        echo '</div>';
        echo '<h5 class="card-title"></h5> <br>';
        echo '<p class="card-text"></p> <br>';
        echo '<p class="card-text"></p>';
        echo '</div>';
      }
      echo '</div>';

      ?>
    <div class="head-text"><h1>Attended Events</h1></div> 
    <div class="card-slider">

      <?php
      include 'conn.php';
      $id = $_SESSION['id'];
      // Fetch end events from the database
      $endEventsQuery = "SELECT * FROM events,attendees WHERE attendees.a_user_id= $id AND events.event_id =attendees.a_event_id";
      $endEventsResult = $connect->query($endEventsQuery);

      // Display events you attended in the slider
      if ($endEventsResult->num_rows > 0) {
        while ($row = $endEventsResult->fetch_assoc()) {
          $eventName = $row['event_name'];
          $eventDescription = $row['event_location'];
          $eventDatetime = $row['event_datetime'];

          echo '<div class="card attended">';
          echo '<div class="aspect-ratio-wrapper">';
          echo '<img src="uploads/' . $row['event_image'] . '" class="card-img-top aspect-ratio-img" alt="Event Image">';
          echo '</div>';          echo '<div class="card-body">';
          echo '<h5 class="card-title">' . $eventName . '</h5>';
          echo '<p class="card-text">' . $eventDescription . '</p>';
          echo '<p class="card-text">' . $eventDatetime . '</p>';
          echo '<a href="Selectedevent.php?key='.$row['event_id'].'" class="btn">More Info</a>';
          echo '</div>';
          echo '</div>';
        }
        
      } else {

        echo '<div class="card attended" style="background-color:rgba(255, 255, 255, 0.2); ">';
        echo '<div class="aspect-ratio-wrapper" >';
        echo '<img src="photo/error.png" class="card-img-top aspect-ratio-img" alt="Event Image">';
        echo '</div>';          echo '<div class="card-body">';       
        echo '</div>';
        echo '<h5 class="card-title"></h5> <br>';
        echo '<p class="card-text"></p> <br>';
        echo '<p class="card-text"></p>';
        echo '</div>';;
      }
      echo '</div>';

      // Close the database connection
      $connect->close();
      ?>
    </div>
        </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script>
    $(document).ready(function() {
      // Initialize the Bootstrap carousel
      $('.card-slider').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
      });
    });
  </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

  </body>
</html>