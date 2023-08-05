<?php include 'logincheck.php' ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ZUJ Events</title>
	    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>
<style type="text/css">

.event-container {
  display: flex;
  overflow-x: scroll;
  -webkit-overflow-scrolling: touch;
  scroll-snap-type: x mandatory;
  width: 100%;
  height: 100%;
}

.event {
  display: flex;
  flex-direction: column;
  scroll-snap-align: center;
  margin: 10px;
  width: 400px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  border-radius: 10px;
  overflow: hidden;
    position: relative;

}
.image {
  position: relative;
  width: 100%;
  height: 300px;
  overflow: hidden;
}

.image img {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.text {
  padding: 10px;
  text-align: center;
}

.text h2 {
  margin: 0;
}

.text p {
  margin: 5px 0;
  font-size:20px;
}

.overlay {
  background-color: rgba(255, 255, 255, 0.5);
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  backdrop-filter: blur(20px);
  overflow: hidden;
  width: 0;
  height: 100%;
  transition: .5s ease;
}

.event:hover .overlay {
  width: 100%;
}
.overlay.text {
  white-space: nowrap; 
  color: white;
  font-size: 16px;
  position: absolute;
  overflow: hidden;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
}
.phone-container {
  position: relative;
  width: 100%; /* Adjust to the size of your image */
}

.phone-container img {
  width: 100%;
}
.tips-container {
  position: relative;
  width: 100%; /* Adjust to the size of your image */
}

.tips-container img {
  width: 100%;
}

.bottomleft {
  position: absolute;
  bottom: 25%;
  left: 10%;
  background-color: #0F9347;
  border-radius: 30px;
  padding:20px 50px;
}
.bottomleft:hover {
  background-color:#0A6631;
  border-radius: 100px;
}
@media screen and (max-width: 768px) {
  .bottomleft {
    bottom: 16%;
    left: 5%;
    background-color: #0F9347;
    border-radius: 30px;
    padding: 10px 20px;

  }
}
@media screen and (max-width: 768px) {
  .event {
  	  display: flex;
  flex-direction: column;
  scroll-snap-align: center;
  width: 180px;
  margin: 10px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  border-radius: 10px;
  overflow: hidden;
  position: relative;
  }
  .image {
  position: relative;
  width: 100%;
  height: 90px;
  overflow: hidden;
}
.text p {
  margin: 5px 0;
  font-size: 10px;
}
}
::-webkit-scrollbar {
  width: 10px;
  height: 10px;
}

/* Set the background color of the scrollbar track */
::-webkit-scrollbar-track {
  background-color: #f1f1f1;
}

/* Set the color and rounded corners of the scrollbar thumb */
::-webkit-scrollbar-thumb {
  background-color: #888;
  border-radius: 5px;
}

/* Set the color and hover style of the scrollbar thumb when it is being hovered over */
::-webkit-scrollbar-thumb:hover {
  background-color: #555;
}
.view-all-btn {
  background-color: #0F9347;
  border-radius: 5px;
  padding: 6px 12px;
  color: #fff;
  text-decoration: none;
  transition: background-color 0.3s ease;
  display: flex;
  align-items: center;
}

.view-all-btn {
  background-color: #0F9347;
  border-radius: 5px;
  padding: 6px 12px;
  color: #fff;
  text-decoration: none;
  transition: background-color 0.3s ease;
  display: flex;
  align-items: center;
}

.view-all-btn .icon {
  background-color: #0c763d;
  padding: 8px;
  border-radius: 50%;
  margin-right: 10px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.view-all-btn .icon i {
  color: #fff;
  font-size: 16px;
}

.view-all-btn:hover {
  background-color: #0c763d;
  transform: translateX(-5px);
}

.view-all-btn:hover .icon {
  background-color: #fff;
}

.view-all-btn:hover .icon i {
  color: #0c763d;
}
.center {
  display: flex;
  justify-content: center;
  align-items: center;
  margin: 10px;
        }
</style>
<body>
	<header><?php include 'header.php';?></header>
<div class >

<div id="carouselExampleCaptions" class="carousel slide" style=" margin-top: 25px;"  >
  <div class="carousel-indicators" >
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner" >
    <div class="carousel-item active">
      <img src="photo/s1.png" class="d-block w-100" alt="photo/slide1.png">

    </div>
    <div class="carousel-item">
      <img src="photo/s2.png" class="d-block w-100" alt="photo/slide2.png">

    </div>
    <div class="carousel-item">
      <img src="photo/s3.png" class="d-block w-100" alt="photo/slide3.png">

    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>


<div class="phone-container">
	<img src="photo/phone2.jpeg">
    <a class="btn bottomleft" href="allevents.php" class="btn">All Events</a>
</div>

<div class="tips-container">
	<img src="photo/tips3.png">
</div>


<div class="sliders">
	<h1>Charity events</h1>
<div class="event-container row-cols-6">
  <?php
    include 'conn.php';

    // Select data from events table
    $sql = "SELECT * FROM events Where  event_type='Charity'AND status='accepted' LIMIT 8";
    $result = mysqli_query($connect, $sql);

    // Display data in events container
    
    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) {
      	$z="SelectedEvent.php?key=".$row['event_id'];
        echo '<div class="event">';
        echo '<div class="image">';
        echo '<img src="uploads/' . $row["event_image"] . '">';
        echo '</div>';
        echo '<div class="text">';
        echo '<h2>' . $row["event_name"] . '</h2>';
        echo '<p>' . $row["event_datetime"] . '</p>';
        echo '<div class= "overlay">';
        echo '<div class="text"><p>'.$row["event_description"].'<p></div>';
        echo '<div class="viewall"><a href="'.$z.'" class="btn" style="background-color: #0F9347; border-radius:5px;" >More info</a></div>';
        echo '</div>';
        echo '<div class="viewall"><a href="'.$z.'" class="btn" style="background-color: #0F9347; border-radius:5px;" >More info</a></div>';
        echo '</div>';
        echo '</div>';


      }
    }else{

        echo '<div class="event">';
        echo '<div class="image">';
        echo '<img src="photo/error.png">';
        echo '</div>';
        echo '<div class="text">';
        echo '<h2></h2>';
        echo '<p></p>';
        echo '</div>';
        echo '</div>';
    }
    ?>

</div>

<div class="center"><a class='btn' href='allevents.php'style='background-color: #0F9347; border-radius:5px;'>View All</a></div>

<div class="sliders">
    <h1>Sporting Events</h1>
<div class="event-container row-cols-6">

<?php

    $sql = "SELECT * FROM events Where  event_type='Sporting Events' AND status='accepted' LIMIT 8";
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) {
        $z="SelectedEvent.php?key=".$row['event_id'];
        echo '<div class="event">';
        echo '<div class="image">';
        echo '<img src="uploads/' . $row["event_image"] . '">';
        echo '</div>';
        echo '<div class="text">';
        echo '<h2>' . $row["event_name"] . '</h2>';
        echo '<p>' . $row["event_datetime"] . '</p>';
        echo '<div class= "overlay">';
        echo '<div class="text"><p>'.$row["event_description"].'<p></div>';
        echo '<div class="viewall"><a href="'.$z.'" class="btn" style="background-color: #0F9347; border-radius:5px;" >More info</a></div>';
        echo '</div>';
        echo '<div class="viewall"><a href="'.$z.'" class="btn" style="background-color: #0F9347; border-radius:5px;" >More info</a></div>';
        echo '</div>';
        echo '</div>';
      }
    }else{

        echo '<div class="event">';
        echo '<div class="image">';
        echo '<img src="photo/error.png">';
        echo '</div>';
        echo '<div class="text">';
        echo '<h2></h2>';
        echo '<p></p>';
        echo '</div>';
        echo '</div>';
    }
    // Close database connection
  ?>

</div>

<div class="center"><a class='btn' href='allevents.php'style='background-color: #0F9347; border-radius:5px;'>View All</a></div>

<div class="sliders">
    <h1>Education Courses events</h1>
<div class="event-container row-cols-6">

<?php

    $sql = "SELECT * FROM events Where  event_type='Education Course' AND status='accepted' LIMIT 8";
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) {
        $z="SelectedEvent.php?key=".$row['event_id'];
        echo '<div class="event">';
        echo '<div class="image">';
        echo '<img src="uploads/' . $row["event_image"] . '">';
        echo '</div>';
        echo '<div class="text">';
        echo '<h2>' . $row["event_name"] . '</h2>';
        echo '<p>' . $row["event_datetime"] . '</p>';
        echo '<div class= "overlay">';
        echo '<div class="text"><p>'.$row["event_description"].'<p></div>';
        echo '<div class="viewall"><a href="'.$z.'" class="btn" style="background-color: #0F9347; border-radius:5px;" >More info</a></div>';
        echo '</div>';
        echo '<div class="viewall"><a href="'.$z.'" class="btn" style="background-color: #0F9347; border-radius:5px;" >More info</a></div>';
        echo '</div>';
        echo '</div>
        ';
      }
    }else{

        echo '<div class="event">';
        echo '<div class="image">';
        echo '<img src="photo/error.png">';
        echo '</div>';
        echo '<div class="text">';
        echo '<h2></h2>';
        echo '<p></p>';
        echo '</div>';
        echo '</div>';
    }
     ?>

</div>

    <div class="center"><a class='btn' href='allevents.php'style='background-color: #0F9347; border-radius:5px;'>View All</a></div>

    <div class="sliders">
    <h1>Ended events</h1>
<div class="event-container row-cols-6">

<?php

    $sql = "SELECT * FROM events Where status='end' ";
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) {
        $z="SelectedEvent.php?key=".$row['event_id'];
        echo '<div class="event">';
        echo '<div class="image">';
        echo '<img src="uploads/' . $row["event_image"] . '">';
        echo '</div>';
        echo '<div class="text">';
        echo '<h2>' . $row["event_name"] . '</h2>';
        echo '<p>' . $row["event_datetime"] . '</p>';
        echo '<div class= "overlay">';
        echo '<div class="text"><p>'.$row["event_description"].'<p></div>';
        echo '<div class="viewall"><a href="'.$z.'" class="btn" style="background-color: #0F9347; border-radius:5px;" >More info</a></div>';
        echo '</div>';
        echo '<div class="viewall"><a href="'.$z.'" class="btn" style="background-color: #0F9347; border-radius:5px;" >More info</a></div>';
        echo '</div>';
        echo '</div>';
      }
    }else{

        echo '<div class="event">';
        echo '<div class="image">';
        echo '<img src="photo/error.png">';
        echo '</div>';
        echo '<div class="text">';
        echo '<h2></h2>';
        echo '<p></p>';
        echo '</div>';
        echo '</div>';
    }
    // Close database connection
 

    // Close database connection
    mysqli_close($connect);
  ?>



</div>
<div class="center"><a class='btn' href='allevents.php'style='background-color: #0F9347; border-radius:5px;'>View All</a></div>
</div>
</div>
</div>
</div>
</div>

<?php include 'footer.php'  ?>
</body>
</html>
