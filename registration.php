<?php
  include "dbconnect.php";
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $housing = $_POST['housing'];
    $experience = $_POST['experience'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($name || $contact || $email || $housing || $experience || $username || $password != NULL) {
      if (!get_magic_quotes_gpc()) {
        $name = addslashes($name);
        $contact = addslashes($contact);
        $email = addslashes($email);
        $housing = addslashes($housing);
        $experinece = addslashes($experience);
        $username = addslashes($username);
        $password = addslashes($password);
      }

      // check for existing username and email
      $checkUsername = "select * from users where username = '".$username."'";
      $usernameResult = $db->query($checkUsername);
      $numUsername = $usernameResult->num_rows;

      $checkEmail = "select * from users where email = '".$email."'";
      $emailResult = $db->query($checkEmail);
      $numEmail = $emailResult->num_rows;

      if ($numUsername != NULL) {
        $usernameError = "Username already exists.";
      }
      if ($numEmail != NULL) {
        $emailError = "Email already exists.";
      }

      // create new user in database
      if ($numUsername == NULL && $numEmail == NULL) {
        $createUser = "insert into users (name, contact, email, housing, experience, username, password) values ('".$name."', ".$contact.", '".$email."', '".$housing."', '".$experience."', '".$username."', '".$password."')";
        $result = $db->query($createUser);

        echo "<script> location.href='index.html'; </script>";
        exit;
      }

      $db->close();
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
        <h1>Registration</h1>
      </div>
    </header>

    <div class="main" id="main">
      <div class="content">
        <div class="registeration">
          <header><h2>Create an account</h2></header>

          <form class="registration-form" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
            <table class="registration-table">
              <tr>
                <td>Name</td>
                <td><input type="text" name="name" value="<?php echo $name;?>" required></td>
                <td><?php echo $nameError;?></td>
              </tr>
              <tr>
                <td>Contact Number</td>
                <td><input type="text" name="contact" value="<?php echo $contact;?>" required></td>
                <td><?php echo $contactError;?></td>
              </tr>
              <tr>
                <td>Email</td>
                <td><input type="email" name="email" value="<?php echo $email;?>" required></td>
                <td><?php echo $emailError;?></td>
              </tr>
              <tr>
                <td>Housing Type</td>
                <td><select name="housing">
                  <option value="NULL">Please select your housing type</option>
                  <option value="HDB 3-room">HDB 3-room</option>
                  <option value="HDB 4-room">HDB 4-room</option>
                  <option value="HDB 5-room">HDB 5-room</option>
                  <option value="Condominium">Condominium</option>
                  <option value="Landed property">Landed Property</option>
                </select></td>
                <td><?php echo $housingError;?></td>
              </tr>
              <tr>
                <td>Experience</td>
                <td><textarea name="experience" rows="3" value="<?php echo $experience;?>"></textarea></td>
                <td><?php echo $experienceError;?></td>
              </tr>
              <tr></tr>
              <tr>
                <td>Username</td>
                <td><input type="text" name="username" value="<?php echo $username;?>" required></td>
                <td><?php echo $usernameError;?></td>
              </tr>
              <tr>
                <td>Password</td>
                <td><input type="password" name="password" value="<?php echo $password;?>" required></td>
                <td><?php echo $passwordError;?></td>
              </tr>
              <tr>
                <td></td>
                <td><input type ="submit" value="Submit"></td>
                <td></td>
              </tr>
            </table>
          </form>

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
