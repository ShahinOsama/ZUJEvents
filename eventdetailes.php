<?php
include 'alcheck.php';
include 'conn.php';

?>

<!DOCTYPE html>
<html>
<head>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        /* Responsive layout */
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            margin-top: 40px;
            background-image: url('photo/event.png');
            background-size: cover;
            background-position: center;
            height: 100vh;
        }

        .header {
            color: white;
            padding: 10px;
            text-align: center;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            color: white;
        }

        .column {
            flex: 50%;
            padding: 10px;
        }

        .post {
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px;
            border-radius: 10px;
            background-color: #212121;
        }

        .post img {
            max-width: 100%;
        }

        button {
            background-color: #0F9347;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 10px 0;
            cursor: pointer;
        }

        .attend-button {
            background-color: #0F9347;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 10px 0;
            cursor: pointer;
        }

        .attend-button:hover {
            background-color: #3e8e41;
        }

        .comment-section {
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px;
            background-color: #212121;
            border-radius: 10px;
                        margin-bottom: 100px;

        }

        .comment-section h3 {
            margin-top: 0;
        }

        .comment {
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px 0;
            color: black;
            background-color: white;
            border-radius: 100px;
        }

        .comment p {
            margin: 0;
                    word-wrap: break-word;

        }

        .comment span {
            font-weight: bold;
        }

        /* Media queries for responsiveness */
        @media screen and (max-width: 800px) {
            .column {
                flex: 100%;
            }
        }

        .return-button {
            background-color: #0F9347;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 10px;
            cursor: pointer;
            border-radius: 5px;
        }

        .return-button:hover {
            background-color: #3e8e41;
        }
    
    </style>
</head>
<body>
    <div class="endevent">
    <a href="eventsReview.php" class="return-button">Return to dashboard</a>
</div>
  <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="background-color: #212121; color: white">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmationModalLabel">Confirm End Event</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to end the event?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
<button type="button" class="btn btn-danger" onclick="aendevent()">End Event</button>
      </div>
    </div>
  </div>
</div>
<?php
$user_id = $_SESSION['Admin_id'];
$event_id = $_GET['key'];
$eventSql = "SELECT * FROM events, attendance_info WHERE events.event_id = $event_id";
$eventResult = mysqli_query($connect, $eventSql);

if (mysqli_num_rows($eventResult) > 0) {
    $eventRow = mysqli_fetch_assoc($eventResult);

    echo '
    <div class="row">
        <div class="column">
            <div class="post">
                <p><img src="uploads/' . $eventRow['event_image'] . '" alt="Post Image"></p>
                <h2>' . $eventRow['event_name'] . '</h2>
                <p>' . $eventRow['event_description'] . '</p>
                <p>Date: ' . $eventRow['event_datetime'] . '</p>
                <p>Duration: ' . $eventRow['event_duration'] . '</p>
                <p>Location: ' . $eventRow['event_location'] . '</p>';

 if ($eventRow['status'] == "end") {
    echo '<div class="endedevent"><a class="btn" style="background-color: #FF3030; border-radius:5px;">Ended</a></div>';
} elseif($eventRow['status'] == "accepted") {
    
        echo '<div class="endevent">
    <button onclick="showConfirmationModal()" class="btn btn-danger" style="border-radius: 5px;">End event</button>
    <a href="reminder.php?key='.$eventRow['event_id'].'" class="btn btn-secondary" style="border-radius: 5px;">Remind attenders</a>
</div>';
    
}elseif($eventRow['status'] == "rejected") {
    
    echo '<div class="endedevent"><a class="btn" style="background-color: #FF3030; border-radius:5px;">Rejected</a></div>';
    
}elseif($eventRow['status'] == "in progress") {
    
    $y = "update.php?key=" . $eventRow['event_id'];
    $z = "delete.php?key=" . $eventRow['event_id'];
    echo'<a class="btn btn-success btn-sm" href="' . $y . '">Accept</a>
    <a class="btn btn-danger btn-sm" style="margin-left: 5px;" href="' . $z . '">Reject</a>';
    
}


echo '</div>
    </div>
    <div class="column">
        <div class="comment-section">
            <h3>Comments</h3>';

// Retrieve comments for the event from the database
$commentSql = "SELECT * FROM comments , attendance_info WHERE comments.event_id = $event_id AND attendance_info.id=comments.user_id";
$commentResult = mysqli_query($connect, $commentSql);

if (mysqli_num_rows($commentResult) > 0) {
    while ($commentRow = mysqli_fetch_assoc($commentResult)) {
        echo '
        <h5 style="color: white;">' . $commentRow['first_name'] . '</h5>
        <div class="comment">
            <p>' . $commentRow['comment'] . '</p>
        </div>';
            echo '
            <a href="adeletecomment.php?key=' . $commentRow['comm_id'] . '" class="btn" style="color: #FF3030; border-radius:70px; right = 5px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                </svg>
            </a>
            
            ';
    }
} else {
    echo '<p>No comments found.</p>';
}


// Check if the user is attending the event and display the comment form


echo '</div>
    </div>
</div>';

} else {
    echo '<p>No event found.</p>';
}

// Close database connection
mysqli_close($connect);
?>

<script>
function openEditCommentModal(commentId, commentText) {
  $('#editCommentModal #comment').val(commentText);
  $('#editCommentModal form').attr('action', 'editcomment.php?key=' + commentId);
  $('#editCommentModal').modal('show');
}
  
  function showConfirmationModal() {
    $('#confirmationModal').modal('show');
  }
  
  function aendevent() {
    // Handle the "End Event" button click logic
    window.location.href = "aendevent.php?key=<?php echo $eventRow['event_id']; ?>";

    $('#editCommentForm').submit(function(e) {
  e.preventDefault();
  var comment = $('#editCommentModal #comment').val();
  var action = $('#editCommentForm').attr('action');
  
  $.ajax({
    url: action,
    type: 'POST',
    data: { comment: comment },
    success: function(response) {
      // Handle the success response here
      // You can reload the page or update the comment dynamically
      window.location.reload();
    },
    error: function(xhr, status, error) {
      // Handle the error here
      console.log(error);
    }
  });
});

function openEditCommentModal(commentId, commentText) {
  $('#editCommentModal #comment').val(commentText);
  $('#editCommentForm').attr('action', 'editcomment.php?key=' + commentId);
  $('#editCommentModal').modal('show');
}
  }
</script>
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
