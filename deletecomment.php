
<?php

require('conn.php');

$id = $_GET['key'];

$commentSql = "SELECT * FROM comments WHERE comm_id = $id";
$commentResult = mysqli_query($connect, $commentSql);

if (mysqli_num_rows($commentResult) > 0) {
    $commentRow = mysqli_fetch_assoc($commentResult);
    $event_id = $commentRow['event_id'];

    $deleteSql = "DELETE FROM comments WHERE comm_id = '$id'";
    $deleteResult = mysqli_query($connect, $deleteSql);

    if ($deleteResult) {
        $redirectUrl = "selectedevent.php?key=$event_id";
        header("Location: $redirectUrl");
        exit;
    } else {
        echo "Error deleting the comment: " . mysqli_error($connect);
    }
} else {
    echo "Comment is already deleted.";
}

mysqli_close($connect);
?>
