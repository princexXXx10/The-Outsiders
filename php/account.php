<?php
session_start();
include_once 'dbconnect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>The Outsider - Account</title>
  <link rel="stylesheet" href="../stylesheet/account.css" />
</head>

<body>
  <header class="header">
    <nav class="navbar">
      <a href="#" class="nav-logo">The Outsider</a>
      <ul class="nav-menu">
        <li class="nav-item">
          <a href="../index.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item">
          <a href="../about.html" class="nav-link">About</a>
        </li>
        <li class="nav-item">
          <a href="../events.html" class="nav-link">Events</a>
        </li>
        <li class="nav-item">
          <a href="account.php" class="nav-link">Account</a>
        </li>
        <li class="nav-item">
          <a href="../contact.html" class="nav-link">Contact</a>
        </li>
      </ul>
      <div class="hamburger">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
      </div>
    </nav>
  </header>

  <main>
    <section class="account">
      <div class="container">
        <div class="collapse navbar-collapse" id="navbar1">
          <ul class="nav navbar-nav navbar-right">
            <?php if (isset($_SESSION['usr_id'])) { ?>
              <li>
                <p class="navbar-text">
                  Signed in as
                  <?php echo $_SESSION['usr_name']; ?>
                <div class="profile">
                  <img src="../Assets/account.jpg" alt="Profile Picture" />
                </div>
                </p>
              </li>
              <button class="btn">
                <li><a href="logout.php">Log Out</a></li>
              </button>
            <?php } else { ?>
              <button class="btn">
                <li><a href="login.php">Login</a></li>
              </button>
              <button class="btn">
                <li><a href="register.php">Sign Up</a></li>
              </button>
            <?php } ?>
          </ul>
        </div>
        <div class="event-history">
          <h2>Event History</h2>
          <div class="event-history--main">
            <div class="event-card">
              <img src="../Assets/eventFive.jpg" alt="Event 6" />
              <h2>Event Name</h2>
              <p>Date: March 1, 2024</p>
              <p>Location: Beachside</p>
              <p>Price: $100</p>
            </div>
            <div class="event-card">
              <img src="../Assets/eventSix.jpg" alt="Event 5" />
              <h2>Event Name</h2>
              <p>Date: March 1, 2024</p>
              <p>Location: Forest Park</p>
              <p>Price: $100</p>
            </div>
          </div>
        </div>
        <div class="upcoming-events">
          <h2>Upcoming Events</h2>
          <div class="upcoming-events--main">
            <div class="event-card">
              <img src="../Assets/eventThree.jpg" alt="Event 3" />
              <h2>Event Name</h2>
              <p>Date: March 1, 2024</p>
              <p>Location: Mountain Peak</p>
              <p>Price: $100</p>
              <button class="btn">Enrolled</button>
            </div>
            <div class="event-card">
              <img src="../Assets/eventFour.jpg" alt="Event 4" />
              <h2>Event Name</h2>
              <p>Date: March 1, 2024</p>
              <p>Location: Beachside</p>
              <p>Price: $100</p>
              <button class="btn">Enrolled</button>
            </div>
          </div>
        </div>
        <button class="btn">
          <a href="../events.html">More Events</a>
        </button>
      </div>
    </section>
  </main>

  <footer>
    <div class="footer-content">
      <p>&copy; 2023 The Outsider - All rights reserved.</p>
    </div>
  </footer>

  <script src="../script.js"></script>
</body>

</html>