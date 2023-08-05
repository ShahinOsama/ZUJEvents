<?php 

$user = 'root';	
$pass = '';
$db = 'zuj-events';

$connect = mysqli_connect ('localhost',$user,$pass,$db);
 if (!$connect)
{
        die("Connection failed: " . mysqli_connect_error());
}
 ?>