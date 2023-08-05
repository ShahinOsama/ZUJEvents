<?php include 'alcheck.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <link rel="stylesheet" href=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="styleadmin.css"> 
</head>
<body>
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

  $q="SELECT * FROM attendance_info";
  $result=mysqli_query($connect,$q);
  $number=mysqli_num_rows($result);
  //echo "number of records".$number."<br>"; 
  echo "<table class='table table-striped-columns'>";
  echo "<tr><th>id</th><th>First Name</th><th>Last Name</th><th>ZUJ ID</th><th>Email</th><th>Phone Number</th><th>University name</th><th>Faculty</th><th>Status</th></tr>";

    
  while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
    $y="deleteuser.php?key=".$row['id'];
    $z="unblock.php?key=".$row['id'];

    //echo $row['id']." ".$row['email']." ".$row['name']." ".$row['faculty']." ".$row['zuj_id']."<br>";
    echo "<tr>";
    echo "<td>".$row['id']."</td>";
    echo "<td>".$row['first_name']."</td>";
    echo "<td>".$row['last_name']."</td>";
    echo "<td>".$row['zuj_id']."</td>";
    echo "<td>".$row['email']."</td>";
    echo "<td>".$row['phone_number']."</td>";
    echo "<td>".$row['university_name']."</td>";
    echo "<td>".$row['college_name']."</td>";
    if($row['user_status']!=="blocked"){ echo '<td><a class="btn btn-danger btn-sm "href="'.$y.'">Block</a></td>';}
    else{echo '<td><a class="btn btn-danger btn-sm ">Blocked</a></td>';}
    if($row['user_status']=="blocked"){ echo '<td><a class="btn btn-active btn-sm "href="'.$z.'">UnBlock</a></td>';} 
    
    echo '</tr>';
        
  }


 ?>
</div>

</div>

</div>
  <script>
    function toggleMenu() {
      let toggle = document.querySelector(".toggle");
      let navigation = document.querySelector(".navigation");
      let main = document.querySelector(".main");
      let content = document.querySelector(".content");
      toggle.classList.toggle("active");
      navigation.classList.toggle("active");
      main.classList.toggle("active");
      content.classList.toggle("active");
    }
  </script>

</body>
</html>

