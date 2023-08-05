<?php include 'alcheck.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="	https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	<link rel="stylesheet" href="styleadmin.css">	
</head>
<body>
	<div class="main-container d-flex">
		<div class="navigation">
			<ul class="list-unstyled px-0 1">
				<li><div class="toggle" onclick="toggleMenu();"></div></li>
				<li>
					<a href="eventsReview.php">
						<img src="photo/logo2.png" style="width: 70px; height: 70px;">
						<h1 class="fs-3" style="margin-left: 15px;">
							<span class="bg-white text-dark rounded shadow px-3 me-1">Admin</span>
							<span class="text-white" style="font-size: 18px;">Dashboard</span>
						</h1>
					</a>
				</li>
				<li>
					<a href="eventsReview.php">
						<span class="icon"><i class="fa-solid fa-list-check fa-2xl" style="padding-left: 20px;"></i></span>
						<span class="title" style="margin-left: 30px;">Pending</span>
					</a>
				</li>
				<li>
					<a href="acceptedEvents.php">
						<span class="icon"><i class="fa-solid fa-clipboard-check fa-2xl" style="padding-left: 23px;"></i></span>
						<span class="title" style="margin-left: 30px;">Accepted events</span>
					</a>
				</li>
				<li>
					<a href="rejectedevents.php">
						<span class="icon"><i class="fa-regular fa-rectangle-xmark fa-2xl" style="padding-left: 20px;"></i></span>
						<span class="title" style="margin-left: 30px;">Rejected events</span>
					</a>
				</li>
				<li>
					<a href="userspage.php">
						<span class="icon"><i class="fa-solid fa-users fa-2xl" style="padding-left: 17px;"></i></span>
						<span class="title" style="margin-left: 30px;">Users</span>
					</a>
				</li>
				<li><a href="adminlogout.php" style="margin-top: 450px;">
						<span class="icon"><i class="fa-solid fa-arrow-right-from-bracket fa-2xl" style="color: #0F9347; padding-left: 17px;"></i></span>
						<span class="title" style="margin-left: 30px;">Logout</span>
					</a></li>
			</ul>
		</div>

		<div class="main"><!-- Page content -->
			<div class="content">
  <?php
  include_once("conn.php");

  $q="SELECT * FROM events , attendance_info  where status = 'rejected' AND events.user_id=attendance_info.id ";
  $result = mysqli_query($connect, $q);
  $number = mysqli_num_rows($result);
  //echo "number of records".$number."<br>"; 
  echo '<div class="table-responsive">';
  echo '<table class="table table-striped">';
  echo '<thead><tr><th>User Name</th><th>Event Name</th><th>Event Description</th><th>Event Date</th><th>Event Time</th><th>Event Location</th><th>Event Type</th><th>Attendance Limit</th><th>Acceptance</th></tr></thead>';
  echo '<tbody>';

  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $y = "update.php?key=" . $row['event_id'];
    $z = "eventdetailes.php?key=" . $row['event_id'];
    echo "<tr>";
    echo "<td>" . $row['first_name'] . "</td>";
    echo "<td>" . $row['event_name'] . "</td>";
    echo "<td>" . $row['event_description'] . "</td>";
    echo "<td>" . $row['event_datetime'] . "</td>";
    echo "<td>" . $row['event_duration'] . "</td>";
    echo "<td>" . $row['event_location'] . "</td>";
    echo "<td>" . $row['event_type'] . "</td>";
    echo "<td>" . $row['event_attendance_limit'] . "</td>";
    echo '<td>
      <a class="btn btn-success btn-sm" href="' . $y . '">Accept</a>
      <a class="btn btn-secondary btn-sm" href="' . $z . '">Details</a>
      </td>';
    echo '</tr>';
  }

  echo '</tbody>';
  echo '</table>';
  echo '</div>';
  ?>
</div>


</div>
  <script>
    function toggleMenu() {
    	let toggle = document.querySelector(".toggle");
      let navigation = document.querySelector(".navigation");
      let main = document.querySelector(".main");
      toggle.classList.toggle("active");
      navigation.classList.toggle("active");
      main.classList.toggle("active");
    }
  </script>

</body>
</html>
