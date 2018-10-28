<?php
// set time zone
date_default_timezone_set('Asia/Singapore');

// get previous and next month
if (isset($_GET['ym'])) {
  $ym = $_GET['ym'];
} else {
  // this month
  $ym = date('Y-m');
}

// check format
$timestamp = strtotime($ym . '-01');
if ($timestamp === false) {
  $ym = date('Y-m');
  $timestamp = strtotime($ym . '-01');
}

// today
$today = date('Y-m-j', time());

// h3 title
$html_title = date('Y / m', $timestamp);

// create previous and next month link... mktime(hour, minute, second, month, day, year)
$prev = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)-1, 1, date('Y', $timestamp)));
$next = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)+1, 1, date('Y', $timestamp)));

// number of days in the month
$day_count = date('t', $timestamp);

// 0:Sun 1:Mon 2:Tue...
$str = date('w', mktime(0, 0, 0, date('m', $timestamp), 1, date('Y', $timestamp)));

// create calendar
$weeks = array();
$week = '';

// add empty cell
$week .= str_repeat('<td></td>', $str);

for ($day = 1; $day <= $day_count; $day++, $str++) {

  $date = $ym . '-' . $day;

  if($today == $date) {
    $week .= '<td class="today">' . $day;
  } else {
    $week .= '<td>'. $day;
  }
  $week .= '</td>';

  // End of the week or end of the month
  if ($str % 7 == 6 || $day == $day_count) {
    if($day == $day.count) {
      // add empt cell
      $week .= str_repeat('<td></td>', 6 - ($str % 7));
    }

    $weeks[] = '<tr>' . $week . '</tr>';

    // prepare for new week
    $week = '';
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
    <link rel="shortcut icon" type="image/png" href="favicon.png">
  </head>
  <body>
    <div class="page">
      <header>
        <div class="header-top">
          <div class="logo2">
            <img src="logo.png" alt="logo" height="50">
          </div>
          <div class="header-top-left">
            <div class="search">
              <form class="" action="" method="post">
                <input type="text" placeholder="Search" name="search">
              </form>
            </div>
            <div class="login2">
              <a href="#">Login</a> <p>&nbsp;|&nbsp;</p> <a href="#">Register</a>
            </div>
          </div>
        </div>

          <nav>
            <ul class="menu">
              <li><a href="index.html">Home</a></li>
              <li><a href="#">About us</a></li>
              <li><a href="adoption.html">Adoption</a></li>
              <li><a href="#">What's on</a></li>
              <li><a href="#">Donate</a></li>
              <li><a href="#">Contact us</a></li>
            </ul>
          </nav>

          <div class="banner">
            <h1>What's On</h1>
          </div>
      </header>

      <div class="main" id="main">
        <div class="content">
          <div class="calendar">
            <h3><a href="?ym=<?php echo $prev; ?>#main">&lt;</a> <?php echo $html_title; ?> <a href="?ym=<?php echo $next; ?>#main">&gt;</a></h3>
            <br>
            <table class="calendar-table">
              <thead>
                <th>Sunday</th>
                <th>Monday</th>
                <th>Tuesday</th>
                <th>Wednesday</th>
                <th>Thursday</th>
                <th>Friday</th>
                <th>Saturday</th>
              </thead>
              <?php
                foreach ($weeks as $week) {
                  echo $week;
                }
              ?>
            </table>
          </div>
        </div>
        </div>

      <footer>
        <div class="footer-content">
          <div class="footer-content-left">

          </div>
          <div class="footer-content-center">
            <div class="footer-facebook"><img src="images/orange-youtube.png" alt="" width="40"></div>
            <div class="footer-instagram"><img src="images/orange-instagram.png" alt="" width="40"></div>
            <div class="footer-youtube"><img src="images/orange-facebook.png" alt="" width="40"></div>
            <div class="footer-rss"><img src="images/orange-rss.png" alt="" width="40"></div>
            <div class="footer-twitter"><img src="images/orange-twitter.png" alt="" width="40"></div>
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
