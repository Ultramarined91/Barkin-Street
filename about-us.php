<?php
  session_start();

  $welcome = '<a href="login.php">Login</a>
              <p>&nbsp;|&nbsp;</p>
              <a href="registration.php">Register</a>';

  if (isset($_SESSION['username'])) {
    $welcome = '<p>Hello, '.$_SESSION["user"].'! &nbsp;|&nbsp;</p>
                <a href="logout.php">Log out</a>';
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Adoption - Barkin Street</title>
  <link rel="stylesheet" href="css/styles.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto|Ubuntu" rel="stylesheet">
  <link rel="shortcut icon" type="image/png" href="images/icons/favicon.png">
</head>

<body>
  <div class="page">

    <header>
      <div class="header-top">
        <div class="logo2"><img src="images/logo.png" alt="logo" height="50"></div>

        <div class="header-top-left">
          <div class="search">
            <form class="" action="" method="post">
              <input type="text" placeholder="Search" name="search">
            </form>
          </div>
          <div class="login2">
            <?php echo $welcome; ?>
          </div>
        </div>
      </div>

      <nav>
        <ul class="menu">
          <li><a href="index.php">Home</a></li>
          <li><a href="about-us.php">About us</a></li>
          <li><a href="adoption.php">Adoption</a></li>
          <li><a href="whats-on.php">What's on</a></li>
          <li><a href="donate.php">Donate</a></li>
          <li><a href="contact-us.php">Contact us</a></li>
        </ul>
      </nav>

      <div class="banner">
        <h1>About Us</h1>
      </div>
    </header>

    <div class="main" id="main">
      <div class="content">

        <div class="about-us">
          <p>About us content here...</p>
        </div>

      </div>
    </div>

    <footer>
      <div class="footer-content">

        <div class="footer-content-left">
        </div>

        <div class="footer-content-center">
          <div class="footer-facebook"><img src="images/icons/orange-youtube.png" alt="" width="40"></div>
          <div class="footer-instagram"><img src="images/icons/orange-instagram.png" alt="" width="40"></div>
          <div class="footer-youtube"><img src="images/icons/orange-facebook.png" alt="" width="40"></div>
          <div class="footer-rss"><img src="images/icons/orange-rss.png" alt="" width="40"></div>
          <div class="footer-twitter"><img src="images/icons/orange-twitter.png" alt="" width="40"></div>
        </div>

        <div class="footer-content-right">
        </div>

      </div>

      <div class="copyright">
        <p>Barkin' Street @ 2018 | All Rights Reserved | Where Dogs Meet People</p>
      </div>
    </footer>

  </div>
</body>

</html>
