<?php
require __DIR__ . "/db/config.php";

$today = date("Y-m-d");

$res = $conn->query("SELECT * FROM visits WHERE id=1");
$row = $res->fetch_assoc();

$total = $row['total'];
$todayCount = $row['today'];
$savedDate = $row['visit_date'];

if ($savedDate !== $today) {
  $todayCount = 1;
  $total++;
  $conn->query("UPDATE visits SET total=$total, today=1, visit_date='$today' WHERE id=1");
} else {
  $todayCount++;
  $total++;
  $conn->query("UPDATE visits SET total=total+1, today=today+1 WHERE id=1");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>MIRAJ XHEAT</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
<div class="container">

  <div class="logo-area">
    <div class="orbit"><span></span><span></span><span></span><span></span></div>
    <img src="assets/img/mirajxheat.jpg" class="logo" alt="logo">
  </div>

  <h1>MIRAJ XHEAT</h1>
  <div class="sub">FREE FIRE CHEAT SELLER</div>
  <div class="badge">OLDEST CHEAT SELLER IN ASIA</div>
  <div class="est">ESTABLISHED SINCE 2018</div>

  <div class="counters">
    <div class="counter">
      <h3>Today's Visits</h3>
      <p><?= $todayCount ?></p>
    </div>
    <div class="counter purple">
      <h3>Total Visits</h3>
      <p><?= $total ?></p>
    </div>
  </div>

  <div class="alert">
    <div class="alert-title">IMPORTANT NOTICE</div>
    <div class="alert-text">
      Telegram can be banned anytime.  
      Keep WhatsApp & Discord as backup.
    </div>
  </div>

  <div class="social">
    <h4>CONNECT WITH US</h4>
    <div class="icons">
      <a class="tg" href="https://t.me/mirajxheatcorporation"><i class="fab fa-telegram"></i></a>
      <a class="wa" href="https://wa.me/8801409185492"><i class="fab fa-whatsapp"></i></a>
      <a class="dc" href="https://discord.gg/qDVRD8RZtF"><i class="fab fa-discord"></i></a>
      <a class="yt" href="https://youtube.com/@mirajxheat"><i class="fab fa-youtube"></i></a>
    </div>
  </div>

  <footer>© 2025 MIRAJ XHEAT</footer>
</div>
</body>
</html>
