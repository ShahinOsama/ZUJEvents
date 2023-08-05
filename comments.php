<!DOCTYPE html>
<html>
<head>
	<title>
	</title>
</head>
<body>
<?php
include 'conn.php'; 

$result = $connect->query($sql);

// Check if any comments were found
if ($result->num_rows > 0) {
    // Loop through each comment and display them
    while ($row = $result->fetch_assoc()) {
        echo "Name: " . $row["first_name"] . "<br>";
        echo "Comment: " . $row["comment"] . "<br><br>";
    }
} else {
    echo "No comments found.";
}

// Close the database connection
$connect->close();
?>
</body>
</html>