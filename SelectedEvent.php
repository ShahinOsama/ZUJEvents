<?php
include 'logincheck.php';
include 'conn.php';
$comment =""; $commentErr = "Write your comment";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST["comment"])) {
        $commentErr = "Write your comment, please";
    } else {
        $comment = $_POST['comment'];
        
        $event_id = $_GET['key'];
        $user_id = $_SESSION['id'];

        // Prepare the SQL statement
        $sql = "INSERT INTO `comments`(`event_id`, `comment`, `user_id`) VALUES ('$event_id','$comment','$user_id')";

        // Execute the statement if the comment is not empty
        if (!empty($comment) && mysqli_query($connect, $sql)) {
            $redirectUrl = "SelectedEvent.php?key=" . $_GET['key'];
            header("Location: $redirectUrl");
            exit;
        } else {
            echo "Error storing the comment: " . mysqli_error($connect);
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Events</title>
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
            background-image: url('photo/1231.png');
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
            
        }

        .post {
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
        @media screen and (max-width: 900px) {
            .column {
                flex: 100%;
            }
            .container
            {
                margin-top:70px ;
            }
        }
    </style>
</head>
<body>
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
        <button type="button" class="btn btn-danger" onclick="endEvent()">End Event</button>
      </div>
    </div>
  </div>
</div>
<?php
include 'header.php';
$user_id = $_SESSION['id'];
$event_id = $_GET['key'];
$eventSql = "SELECT * FROM events, attendance_info WHERE events.event_id = $event_id";
$eventResult = mysqli_query($connect, $eventSql);
$datetimeFromDB = '2023-05-25 15:30:00';

$dateTime = new DateTime($datetimeFromDB);

// Separate date and time
$date = $dateTime->format('Y-m-d');
$time = $dateTime->format('h:i:s A');
if (mysqli_num_rows($eventResult) > 0) {
    $eventRow = mysqli_fetch_assoc($eventResult);

    echo '
    <div class="container" style="background-color: rgba(0, 0, 0, 0.7); backdrop-filter: blur(40px); padding-top:20px; ">
    <div class="row" >
        <div class=" col-md-12">
            <div class="post">
                <p><img src="uploads/' . $eventRow['event_image'] . '" alt="Post Image"></p>
                <h2>' . $eventRow['event_name'] . '</h2>
                <p>' . $eventRow['event_description'] . '</p>

                <p><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-event" viewBox="0 0 16 20">
  <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
  <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
</svg> Date: ' . $date . '</p>

                <p><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 20">
  <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
  <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/>
</svg> Time: ' . $time . '</p>

                <p><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-alarm" viewBox="0 0 16 20">
  <path d="M8.5 5.5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9V5.5z"/>
  <path d="M6.5 0a.5.5 0 0 0 0 1H7v1.07a7.001 7.001 0 0 0-3.273 12.474l-.602.602a.5.5 0 0 0 .707.708l.746-.746A6.97 6.97 0 0 0 8 16a6.97 6.97 0 0 0 3.422-.892l.746.746a.5.5 0 0 0 .707-.708l-.601-.602A7.001 7.001 0 0 0 9 2.07V1h.5a.5.5 0 0 0 0-1h-3zm1.038 3.018a6.093 6.093 0 0 1 .924 0 6 6 0 1 1-.924 0zM0 3.5c0 .753.333 1.429.86 1.887A8.035 8.035 0 0 1 4.387 1.86 2.5 2.5 0 0 0 0 3.5zM13.5 1c-.753 0-1.429.333-1.887.86a8.035 8.035 0 0 1 3.527 3.527A2.5 2.5 0 0 0 13.5 1z"/>
</svg> Duration: ' . $eventRow['event_duration'] . '</p>

                <p><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 20">
  <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
</svg> Location: ' . $eventRow['event_location'] . '</p>';

 if ($eventRow['status'] == "end") {
    echo '<div class="endedevent"><a class="btn" style="background-color: #FF3030; border-radius:5px;">Ended</a></div>';
} else {
    if ($eventRow['user_id'] == $user_id) {
        echo '<div class="endevent">
    <button onclick="showConfirmationModal()" class="btn btn-danger" style="border-radius: 5px;">End event</button>
    <a href="reminder.php?key='.$eventRow['event_id'].'" class="btn btn-secondary" style="border-radius: 5px;">Remind attenders</a>
</div>';
    } else {
        $attendeesSql = "SELECT * FROM attendees WHERE a_user_id = $user_id AND a_event_id = $event_id";
        $attendeesResult = mysqli_query($connect, $attendeesSql);

        if (mysqli_num_rows($attendeesResult) > 0) {
            echo '<div class="Attend"><a class="btn" style="background-color: #0F9347; border-radius:5px;">Already Attended</a></div>';
        } else {
            echo '<div class="Attend"><a href="sendmail.php?key=' . $eventRow['event_id'] . '" class="btn" style="background-color: #0F9347; border-radius:5px;">Attend</a></div>';
        }
    }
}


echo '</div>
    </div>
    <div class=" col-md-12">
        <div class="comment-section">
            <h3>Comments</h3>';

// Retrieve comments for the event from the database
$commentSql = "SELECT * FROM comments , attendance_info WHERE comments.event_id = $event_id AND attendance_info.id=comments.user_id";
$commentResult = mysqli_query($connect, $commentSql);

if (mysqli_num_rows($commentResult) > 0) {
    while ($commentRow = mysqli_fetch_assoc($commentResult)) {
        echo '
        <h5 style="color: white;">' . $commentRow['first_name'] .' '. $commentRow['last_name'] .'</h5>
        <div class="comment">
            <p>' . $commentRow['comment'] . '</p>
        </div>';

        // Check if the comment was made by the current user
        if ($commentRow['user_id'] == $user_id) {
            echo '
            <a href="deletecomment.php?key=' . $commentRow['comm_id'] . '" class="btn" style="color: #FF3030; border-radius:70px; right = 5px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                </svg>
            </a>
            <button class="btn" style="border-radius:70px; color: white;" onclick="openEditCommentModal(\'' . $commentRow['comm_id'] . '\', \'' . $commentRow['comment'] . '\')">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="grey" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                </svg>
            </button>';
        } elseif ($eventRow['user_id'] == $user_id) { // Check if the event was created by the current user
            echo '
            <a href="deletecomment.php?key=' . $commentRow['comm_id'] . '" class="btn" style="color: #FF3030; border-radius:70px; right = 5px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                </svg>
            </a>
            
            ';
        } else {
            echo '';
        }
    }
} else {
    echo '<p>No comments found.</p>';
}


// Check if the user is attending the event and display the comment form
$commentsSql = "SELECT * FROM attendees WHERE a_user_id = $user_id AND a_event_id = $event_id";
$commentsResult = mysqli_query($connect, $commentsSql);

if (mysqli_num_rows($commentsResult) > 0) {
    echo '<form method="POST" action="">
            <input placeholder="' . $commentErr . '" type="text" class="form-control" name="comment" style="padding: 20px; margin-top: 15px;">
            <button type="submit" style="background-color: #0F9347; border-radius:5px;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send-fill" viewBox="0 0 16 16">
                    <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z"/>
                </svg>
            </button>
        </form>';
} else {
    echo '';
}

echo '</div>
    </div>
</div> ';

} else {
    echo '<p>No event found.</p>';
}

// Close database connection
mysqli_close($connect);
?>
</div>
<div class="modal fade" id="editCommentModal" tabindex="-1" aria-labelledby="editCommentModalLabel" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content" style="background-color: rgba(255, 255, 255, 0.9);">
      <div class="modal-header">
        <h5 class="modal-title" id="editCommentModalLabel">Edit Comment</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
<form method="POST" action="" id="editCommentForm">
          <div class="mb-3">
            <label for="comment" class="form-label">Comment</label>
            <textarea class="form-control" name="comment" rows="3"></textarea>
          </div>
          <button type="submit" class="btn" id="updateCommentBtn" style="color: white; background-color: #0F9347;">Update Comment</button>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
function openEditCommentModal(commentId, commentText) {
  $('#editCommentModal #comment').val(commentText);
  $('#editCommentModal form').attr('action', 'editcomment.php?key=' + commentId);
  $('#editCommentModal').modal('show');
}
  
  function showConfirmationModal() {
    $('#confirmationModal').modal('show');
  }
  
  function endEvent() {
    // Handle the "End Event" button click logic
    window.location.href = "endevent.php?key=<?php echo $eventRow['event_id']; ?>";

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
<?php include 'footer.php'; ?>
</html>
