<?php include 'logincheck.php' ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>About Us</title>
		    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

</head>
<style type="text/css">
body
{
	background-color: #191919;
	  top: 100%;

}
	.first {
  position: relative;
  text-align: center;
  color: white;
  font-family: Fantasy;
  margin-top:35px;
  max-width: 100%;
  height: auto;
}
img {
  max-width: 100%;
  height: auto;
}
h1
{
font-size: 90px;
}
a.nav-link
{
	color: whitesmoke;
}
/* Bottom left text */
.bottom-left {
  position: absolute;
  bottom: 8px;
  left: 16px;
}

/* Top left text */
.top-left {
  position: absolute;
  top: 8px;
  left: 16px;
}

/* Top right text */
.top-right {
  position: absolute;
  top: 90px;
  left: 90px;
}

/* Bottom right text */
.bottom-right {
  position: absolute;
  bottom: 50px;
  left: 16px;
}

/* Centered text */
.centered {
  position: absolute;
  top: 30%;
  left: 50%;
  transform: translate(-50%, -50%);
}
@media screen and (max-width: 768px) {
  h1 {
font-size: 30px;
  }
 .first {
  margin-top:40px;
}
</style>
<body>
	<?php include 'header.php' ?>
	<div class="about">
<div class="first">
  <img src="photo/wavy.png" alt="Snow" style="width:100%;">
  <div class="centered" ><h1> About Us</h1></div>
</div>
<div class="second" style="margin-top: 30px;">
  <img src="photo/11.png" alt="Snow" style="width:100%;">
</div>
<div class="third" style="margin-top: 5px;">
  <img src="photo/33.png" alt="Snow" style="width:100%;">
</div>
<div class="third" style="margin-top: 5px;">
  <img src="photo/32.png" alt="Snow" style="width:100%;">
</div>
</div>
<?php include 'footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>