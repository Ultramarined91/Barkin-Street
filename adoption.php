<?php
  session_start();
  include "dbconnect.php";

  // session
  $welcome = '<a href="login.php">Login</a>
              <p>&nbsp;|&nbsp;</p>
              <a href="registration.php">Register</a>';

  if (isset($_SESSION['username'])) {
    $welcome = '<p>Hello, '.$_SESSION["user"].'! &nbsp;|&nbsp;</p>
                <a href="logout.php">Log out</a>';
  }


  // HDB 3-room, 4-room -> small, medium dogs
  if ($_SESSION['housing'] == 'HDB 3-room' || $_SESSION['housing'] == 'HDB 4-room') {
    $recdogs = array();
    $i= 0;
    $query = "select * from dogs where size in ('small', 'medium') and adopter = 0";
    $result = $db->query($query);
    if ($result->num_rows > 0 ) {
      while($row = $result->fetch_assoc()) {
        $recdogs[$i] = $row["image"];
        $i++;
      }
    }
  }

  // HDB 5-room, Condominium -> medium dogs
  if ($_SESSION['housing'] == 'HDB 5-room' || $_SESSION['housing'] == 'Condominium') {
    $recdogs = array();
    $i= 0;
    $query = "select * from dogs where size in ('medium') and adopter = 0";
    $result = $db->query($query);
    if ($result->num_rows > 0 ) {
      while($row = $result->fetch_assoc()) {
        $recdogs[$i] = $row["image"];
        $i++;
      }
    }
  }

  // Landed property -> medium, large dogs
  if ($_SESSION['housing'] == 'Landed property') {
    $recdogs = array();
    $i = 0;
    $query = "select * from dogs where size in ('medium', 'large') and adopter = 0";
    $result = $db->query($query);
    if ($result->num_rows > 0 ) {
      while($row = $result->fetch_assoc()) {
        $recdogs[$i] = $row["image"];
        $i++;
      }
    }
  }

  if ($SERVER["REQUEST_METHOD"] == "POST") {
    $breed = $_POST['breed'];
    $size = $_POST['size'];
    $age = $_POST['age'];
    $filterResults = "hello";

    if ($breed && $size && $age != 0){
      if ($age == "Young") {
        $query = "select * from dogs where breed = '".$breed."' and size = '".$size."' and age =< 3";
        $result = $db->query($query);
        if ($result-> num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            echo "Hello";
          }
        }
      }
    }





  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Adoption - Barkin Street</title>
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/calendar.css">
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
          <li><a href="#">Adoption</a></li>
          <li><a href="whats-on.php">What's on</a></li>
          <li><a href="donate.php">Donate</a></li>
          <li><a href="contact-us.php">Contact us</a></li>
        </ul>
      </nav>

      <div class="banner">
        <h1>Adoption</h1>
      </div>
    </header>

    <div class="main" id="main">
      <div class="content">
        <div class="recommended">
          <header><h2>Recommended for you</h2></header>

          <section class="container adoption-recommended">
            <div class="dog">
              <figure><img src=<?php echo "images/dogs/".$recdogs[0];?> alt=""></figure>
            </div>
            <div class="dog">
              <figure><img src=<?php echo "images/dogs/".$recdogs[1];?> alt=""></figure>
            </div>
            <div class="dog">
              <figure><img src=<?php echo "images/dogs/".$recdogs[2];?> alt=""></figure>
            </div>
            <div class="dog">
              <figure><img src=<?php echo "images/dogs/".$recdogs[3];?> alt=""></figure>
            </div>
            <div class="dog">
              <figure><img src=<?php echo "images/dogs/".$recdogs[4];?> alt=""></figure>
            </div>
          </section>

          <article class="container adoption-main">
            <header><h2>Search for your ideal dog</h2></header>
            <form class="fitler-form" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
              <label>Breed:</label>
              <select class="filter1" name="breed">
                <option value="0">No preference</option>
                <?php
                  $query = "select distinct breed from dogs";
                  $result = $db->query($query);
                  if ($result->num_rows > 0 ) {
                    while($row = $result->fetch_assoc()) {
                      echo '<option value="'.$row["breed"].'">'.$row["breed"].'</option>';
                    }
                  }
                ?>
              </select>
              <label>Size:</label>
              <select class="filter1" name="size">
                <option value="0">No preference</option>
                <option value="small">Small</option>
                <option value="medium">Medium</option>
                <option value="Large">Large</option>
              </select>
              <label>Age:</label>
              <select class="filter1" name="age">
                <option value="No preference">No preference</option>
                <option value="Young">Young</option>
                <option value="Adult">Adult</option>
              </select>
              <input type ="submit" value="Submit">
            </form>

            <div class="filtered-dogs">
              <p>
                <?php echo $filterResults; ?>
              </p>
            </div>
          </article>

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
