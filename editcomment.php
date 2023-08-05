<?php
include 'logincheck.php';
include 'conn.php';

// Check if the comment ID is provided in the URL
if (isset($_GET['key'])) {
    $comment_id = $_GET['key'];

    // Retrieve the comment data from the database
    $commentSql = "SELECT * FROM comments WHERE comm_id = $comment_id";
    $commentResult = mysqli_query($connect, $commentSql);

    if (mysqli_num_rows($commentResult) > 0) {
        $commentRow = mysqli_fetch_assoc($commentResult);

        // Check if the logged-in user is the owner of the comment
        if ($commentRow['user_id'] == $_SESSION['id']) {
            $comment = $commentRow['comment'];

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Update the comment with the new content
                $newComment = $_POST['comment'];

                $updateSql = "UPDATE comments SET comment = '$newComment' WHERE comm_id = $comment_id";

                if (mysqli_query($connect, $updateSql)) {
                    $redirectUrl = "SelectedEvent.php?key=" . $commentRow['event_id'];
                    header("Location: $redirectUrl");
                    exit;
                } else {
                    echo "Error updating the comment: " . mysqli_error($connect);
                }
            }
        } else {
            // Redirect the user if they are not the owner of the comment
            $redirectUrl = "SelectedEvent.php?key=". $commentRow['event_id'];
            header("Location: $redirectUrl");
            exit;
        }
    } else {
        // Redirect the user if the comment ID is invalid or not found
        header("Location: SelectedEvent.php");
        exit;
    }
} else {
    // Redirect the user if the comment ID is not provided
    header("Location: SelectedEvent.php");
    exit;
}

// Close database connection
mysqli_close($connect);
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

</head>
<body>
    <div class="container">
        <h1>Edit Comment</h1>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="comment" class="form-label">Comment</label>
                <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update Comment</button>
        </form>
    </div>

    <script>
        // Close the popup when the form is submitted
        document.querySelector('form').addEventListener('submit', function () {
            window.opener.location.reload();  // Reload the parent page after form submission
            window.close();  // Close the popup window
        });
    </script>
</body>
</html>

</html>