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
  <title>Barkin Street - Homepage</title>
  <link rel="stylesheet" href="css/styles.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto|Ubuntu" rel="stylesheet">
  <link rel="shortcut icon" type="image/png" href="images/icons/favicon.png">
</head>

<body>
  <div class="page">

    <header>
      <div class="featured">
        <div class="login">
          <?php echo $welcome; ?>
        </div>
        <div class="logo">
          <img src="images/logo.png" alt="logo" height="80">
        </div>

        <div class="featured-picture">
          <img src="images/dogs/01-adora.jpeg" alt="">
        </div>
        <div class="featured-picture">
          <img src="images/dogs/04-toby.jpg" alt="">
        </div>
        <div class="featured-picture">
            <img src="images/dogs/02-chester.jpeg" alt="">
        </div>
      </div>

      <nav>
        <ul class="menu">
          <li><a href="#">Home</a></li>
          <li><a href="about-us.php">About us</a></li>
          <li><a href="adoption.php">Adoption</a></li>
          <li><a href="whats-on.php">What's on</a></li>
          <li><a href="donate.php">Donate</a></li>
          <li><a href="cpntact-us.php">Contact us</a></li>
        </ul>
      </nav>
    </header>

    <div class="main">
      <div class="content">

        <article class="content-main">
          <header>
            <h2>Give them a home</h2>
            <p>View our featured dogs ready for adoption!</p>
          </header>

          <div class="dogs">
            <div class="dog">
              <figure><img src="" alt=""></figure>
              <h3>Name</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
            <div class="dog">
              <figure><img src="" alt=""></figure>
              <h3>Name</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
            <div class="dog">
              <figure><img src="" alt=""></figure>
              <h3>Name</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
            <div class="dog">
              <figure><img src="" alt=""></figure>
              <h3>Name</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
            <div class="dog">
              <figure><img src="" alt=""></figure>
              <h3>Name</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
            <div class="dog">
              <figure><img src="" alt=""></figure>
              <h3>Name</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
          </div>
        </article>

        <article class="content-side">
          <header>
            <h2>Recent News</h2>
            <p>&nbsp;</p>
          </header>

          <div class="news">
            <figure><img src="" alt=""></figure>
            <p class="date">October 26, 2018</p>
            <h3>News Title</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <a href="#">Read More ></a>
          </div>
          <div class="news">
            <figure><img src="" alt=""></figure>
            <p class="date">October 26, 2018</p>
            <h3>News Title</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <a href="#">Read More ></a>
          </div>
          <div class="news">
            <figure><img src="" alt=""></figure>
            <p class="date">October 26, 2018</p>
            <h3>News Title</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <a href="#">Read More ></a>
          </div>
        </article>

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
