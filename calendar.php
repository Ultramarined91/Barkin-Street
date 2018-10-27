<?php
// Set your timezone
date_default_timezone_set('Asia/Singapore');
// Get prev & next month
if (isset($_GET['ym'])) {
    $ym = $_GET['ym'];
} else {
    // This month
    $ym = date('Y-m');
}
// Check format
$timestamp = strtotime($ym . '-01');
if ($timestamp === false) {
    $ym = date('Y-m');
    $timestamp = strtotime($ym . '-01');
}
// Today
$today = date('Y-m-j', time());
// For H3 title
$html_title = date('Y / m', $timestamp);
// Create prev & next month link     mktime(hour,minute,second,month,day,year)
$prev = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)-1, 1, date('Y', $timestamp)));
$next = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)+1, 1, date('Y', $timestamp)));
// You can also use strtotime!
// $prev = date('Y-m', strtotime('-1 month', $timestamp));
// $next = date('Y-m', strtotime('+1 month', $timestamp));
// Number of days in the month
$day_count = date('t', $timestamp);

// 0:Sun 1:Mon 2:Tue ...
$str = date('w', mktime(0, 0, 0, date('m', $timestamp), 1, date('Y', $timestamp)));
//$str = date('w', $timestamp);
// Create Calendar!!
$weeks = array();
$week = '';
// Add empty cell
$week .= str_repeat('<td></td>', $str);
for ( $day = 1; $day <= $day_count; $day++, $str++) {

    $date = $ym . '-' . $day;

    if ($today == $date) {
        $week .= '<td class="today">' . $day;
    } else {
        $week .= '<td>' . $day;
    }
    $week .= '</td>';

    // End of the week OR End of the month
    if ($str % 7 == 6 || $day == $day_count) {
        if ($day == $day_count) {
            // Add empty cell
            $week .= str_repeat('<td></td>', 6 - ($str % 7));
        }
        $weeks[] = '<tr>' . $week . '</tr>';
        // Prepare for new week
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
              <li><a href="#">Adoption</a></li>
              <li><a href="#">What's on</a></li>
              <li><a href="#">Donate</a></li>
              <li><a href="#">Contact us</a></li>
            </ul>
          </nav>

          <div class="banner">
            <h1>What's On</h1>
          </div>
      </header>

      <div class="main">
        <div class="calendar">
          <h3><a href="?ym=<?php echo $prev; ?>">&lt;</a> <?php echo $html_title; ?> <a href="?ym=<?php echo $next; ?>">&gt;</a></h3>
          <br>
          <table>
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
