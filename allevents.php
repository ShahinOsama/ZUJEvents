<?php
include 'conn.php';
include 'logincheck.php';

// Fetch all events from the events table
$sql = "SELECT * FROM events WHERE status='accepted'";
$result = mysqli_query($connect, $sql);

// Fetch unique event types for filter options
$eventTypes = mysqli_query($connect, "SELECT DISTINCT event_type FROM events WHERE status='accepted'");

// Function to filter events by event type
function filterEvents($eventType) {
    include 'conn.php';
    $filteredEvents = [];

    if ($eventType === 'All') {
        // If 'All' is selected, fetch all events with status 'accepted'
        $sql = "SELECT * FROM events WHERE status='accepted'";
    } else {
        // Fetch events with the specified event type and status 'accepted'
        $sql = "SELECT * FROM events WHERE event_type = '$eventType' AND status='accepted'";
    }

    $result = mysqli_query($connect, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        $filteredEvents[] = $row;
    }

    return $filteredEvents;
}

// Check if filter button is clicked
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['filter'])) {
    $selectedType = $_POST['eventType'];

    // Filter events based on the selected event type
    $filteredEvents = filterEvents($selectedType);
} else {
    // By default, display all events
    $filteredEvents = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $filteredEvents[] = $row;
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>All Events</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
      body
      {
            font-family: Arial, sans-serif;
            margin: 0;
            margin-top: 60px;
            background-image: url('photo/1231.png');
            background-size: cover;
            background-position: center;
            height: 100vh;
      }
        .card {
            margin-bottom: 20px;
            height: 300px;
            perspective: 1000px;
                        background-color: rgba(255, 255, 255, 0);


        }

        .card-inner {
            position: relative;
            width: 100%;
            height: 100%;
            transition: transform 0.6s;
            transform-style: preserve-3d;
        }

        .card:hover .card-inner {
            transform: rotateY(180deg);
        }

        .card-front,
        .card-back {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            border-radius: 5px;
        }

        .card-front {

            color: black;
        }

        .card-back {
            background-color: rgba(255, 255, 255, 0.5);
            color: black;
            transform: rotateY(180deg);
            padding: 20px;
            flex-direction: column;
        }

        .card-back h5,
        .card-back p {
            margin: 0;
            word-wrap: break-word;

        }

        .card-back p {
            margin-bottom: 10px;
            word-wrap: break-word;

        }

        .card-back button {
            background-color: transparent;
            border: none;
            color: white;
            text-decoration: underline;
            cursor: pointer;
        }
    </style>
</head>

<body>
  <?php include 'header.php'; ?>
    <div class="container">
        <h1>Events</h1>

        <form class="filter-form" method="POST" style="padding-bottom: 20px; ">
            <label for="eventType">Filter by Event Type:</label>
            <select name="eventType" id="eventType" style="padding: 5px; border-radius:30px; background:rgba(255, 255, 255, 0.7) ">
                <option >All</option>
                <?php while ($row = mysqli_fetch_assoc($eventTypes)): ?>
                    <option value="<?php echo $row['event_type']; ?>"><?php echo $row['event_type']; ?></option>
                <?php endwhile; ?>
            </select>
            <button type="submit" name="filter" class="btn" style="background-color: #0F9347; border-radius:50px;">Filter</button>
        </form>

        <?php if (!empty($filteredEvents)): ?>

            <div class="row">
                <?php foreach ($filteredEvents as $event):  ?>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-inner">
                                <div class="card-front">

                                    <img src="uploads/<?php echo $event['event_image']; ?>" alt="Event Image" style="width: 100%; height: 100%; object-fit: cover;">
                                </div>
                                <div class="card-back">
                                    <h5><?php echo $event['event_name']; ?></h5>
                                    <p><?php echo $event['event_description']; ?></p>
                                    <p>Date and Time: <?php echo $event['event_datetime']; ?></p>
                                    <a href="<?php echo "SelectedEvent.php?key=".$event['event_id']; ?>" class="btn" style="background-color: #0F9347; border-radius:5px;" >More info</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p>No events found.</p>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <?php include 'footer.php'; ?>
</body>
</html>
