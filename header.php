<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8" />
    <title></title>
    <style type="text/css">
        .navbar {
            background-color: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(40px);
        }

        .nav-link {
            color: white;
        }

        .nav-link:hover {
            color: grey;
        }

        .nav-item {
            position: relative;
        }

        .nav-item:hover::after {
            opacity: 1;
        }

        .nav-item:after {
            opacity: 0;
            transition: all 0.2s;
            content: '';
            height: 2px;
            width: 100%;
            background-color: #0F9347;
            position: absolute;
            bottom: 0;
            left: 0;
        }

        .dropdown-item:hover {
            background-color: #0F9347;
        }

        /* Move dropdown menu to the left */

    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top justify-content-end" id="navbarNav">
        <div class="container-fluid">
            <div class="nav-logo"><a class="navbar-brand" href="home.php"><img src="photo/logo2.png" style="height: 50px;"></a></div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="home.php"></svg> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="allevents.php"></svg> All Events</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="makeevent.php">Create event</a>
                    </li>
                </ul>
                <?php if (isset($_SESSION['id'])) { ?>
                    <ul class="navbar-nav ms-auto">
                        <li class='nav-item dropdown' style=" margin-right: 50px">
                            <a class="nav-link dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 20 20">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                </svg> <?php echo $_SESSION['first_name']; ?>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" style="background-color:rgba(255, 255, 255, 0.7); backdrop-filter: blur(40px); ">
                                <li><a class="dropdown-item" href="profile.php"><?php echo $_SESSION['first_name']; ?> Profile</a></li>
                                <li><a class="dropdown-item" href="myevents.php">My Events</a></li>
                                <li><a class="dropdown-item" href="aboutus.php">About us </a></li>
                                <li><a class="dropdown-item" href="contactus.php">Help</a></li>
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            </ul>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>
    </body>
</html>
