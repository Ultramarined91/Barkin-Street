<?php
  session_start();
  include "dbconnect.php";


  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username != NULL && $password != NULL) {
      if (!get_magic_quotes_gpc()) {
        $username = addslashes($username);
        $password = addslashes($password);
      }

      $query = "select * from users where username = '".$username."' and password = '".$password."'";
      $result = $db->query($query);
      if ($result->num_rows > 0) {
        // if valid user, create session
        while($row = $result->fetch_assoc()) {
          $_SESSION['user'] = $row['name'];
          $_SESSION['contact'] = $row['contact'];
          $_SESSION['email'] = $row['email'];
          $_SESSION['housing'] = $row['housing'];
          $_SESSION['experience'] = $row['experience'];
          $_SESSION['username'] = $row['username'];
        }

        // redirect back to index page after logging in
        echo "<script> location.href='index.php'; </script>";
        exit;
      }
      else {
        // if not valid user
        $authfail = "Username and password do not match.";
      }
    }
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Barkin Street - What's On</title>
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
            <a href="login.php">Login</a>
            <p>&nbsp;|&nbsp;</p>
            <a href="registration.php">Register</a>
          </div>
        </div>
      </div>

      <nav>
        <ul class="menu">
          <li><a href="index.html">Home</a></li>
          <li><a href="#">About us</a></li>
          <li><a href="#">Adoption</a></li>
          <li><a href="whats-on.php">What's on</a></li>
          <li><a href="#">Donate</a></li>
          <li><a href="#">Contact us</a></li>
        </ul>
      </nav>

      <div class="banner">
        <h1>Log in</h1>
      </div>
    </header>

    <div class="main" id="main">
      <div class="content">
        <div class="log-in">
          <header><h2>Log in</h2></header>
          <p><?php echo $authfail; ?></p>

          <form class="login-form" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
            <table class="login-table">
              <tr>
                <th>Username</th>
                <td><input type="text" name="username" required></td>
              </tr>
              <tr>
                <th>Password</th>
                <td><input type="password" name="password" required></td>
              </tr>
              <tr>
                <td></td>
                <td><input type="submit" value="Log in"></td>
              </tr>
            </table>
          </form>

          <p>
            Not a part of the committee yet?
            <a href="registration.php">Register now!</a>
          </p>

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
