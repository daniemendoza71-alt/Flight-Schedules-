<?php
// Main timezone
$phZone = new DateTimeZone("Asia/Manila");
$nowPH = new DateTime("now", $phZone);

// World Time
$ph_time = new DateTime("now", new DateTimeZone("Asia/Manila"));
$jp_time = new DateTime("now", new DateTimeZone("Asia/Tokyo"));
$cn_time = new DateTime("now", new DateTimeZone("Asia/Shanghai"));
$us_time = new DateTime("now", new DateTimeZone("America/New_York"));

// Sample times
$dep = new DateTime("2026-01-22 08:30", $phZone);
$arr = new DateTime("2026-01-22 09:55", $phZone);

// Status
if ($nowPH < $dep) {
    $status = "Upcoming";
} elseif ($nowPH > $arr) {
    $status = "Arrived";
} else {
    $status = "In Air";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Flight Schedules</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<div class="box">

<h1>✈️ Flight Schedules</h1>
<p class="datetime"><?= $nowPH->format("F d, Y | h:i A"); ?></p>

<!-- ================= DOMESTIC ================= -->
<h2>Domestic Flights</h2>
<div class="flight-grid">

    <div class="flight">
        <img src="images/baguio.jpg" alt="Baguio">
        <div class="details">
            <p><b>Flight:</b> DOM101</p>
            <p><b>From:</b> Manila</p>
            <p><b>To:</b> Baguio</p>
            <p><b>Status:</b> <?= $status ?></p>
        </div>
    </div>

    <div class="flight">
        <img src="images/clark.png" alt="Clark">
        <div class="details">
            <p><b>Flight:</b> DOM102</p>
            <p><b>From:</b> Manila</p>
            <p><b>To:</b> Clark</p>
            <p><b>Status:</b> <?= $status ?></p>
        </div>
    </div>

    <div class="flight">
        <img src="images/palawan.jpg" alt="Palawan">
        <div class="details">
            <p><b>Flight:</b> DOM103</p>
            <p><b>From:</b> Clark</p>
            <p><b>To:</b> Palawan</p>
            <p><b>Status:</b> <?= $status ?></p>
        </div>
    </div>

    <div class="flight">
        <img src="images/batangas.jpg" alt="Batangas">
        <div class="details">
            <p><b>Flight:</b> DOM104</p>
            <p><b>From:</b> Manila</p>
            <p><b>To:</b> Batangas</p>
            <p><b>Status:</b> <?= $status ?></p>
        </div>
    </div>

    <div class="flight">
        <img src="images/mindanao.jpg" alt="Mindanao">
        <div class="details">
            <p><b>Flight:</b> DOM105</p>
            <p><b>From:</b> Cebu</p>
            <p><b>To:</b> Mindanao</p>
            <p><b>Status:</b> <?= $status ?></p>
        </div>
    </div>

</div>

<!-- ================= INTERNATIONAL ================= -->
<h2>International Flights</h2>
<div class="flight-grid international">

    <div class="flight">
        <img src="images/osaka.jpg" alt="Japan">
        <div class="details">
            <p><b>Flight:</b> INT201</p>
            <p><b>From:</b> Manila</p>
            <p><b>To:</b> Japan</p>
            <p><b>Status:</b> Upcoming</p>
        </div>
    </div>

    <div class="flight">
        <img src="images/china.webp" alt="China">
        <div class="details">
            <p><b>Flight:</b> INT202</p>
            <p><b>From:</b> Manila</p>
            <p><b>To:</b> China</p>
            <p><b>Status:</b> <?= $status ?></p>
        </div>
    </div>

    <div class="flight">
        <img src="images/india.jpg" alt="India">
        <div class="details">
            <p><b>Flight:</b> INT203</p>
            <p><b>From:</b> Manila</p>
            <p><b>To:</b> India</p>
            <p><b>Status:</b> <?= $status ?></p>
        </div>
    </div>

    <div class="flight">
        <img src="images/germany.webp" alt="Germany">
        <div class="details">
            <p><b>Flight:</b> INT204</p>
            <p><b>From:</b> Manila</p>
            <p><b>To:</b> Germany</p>
            <p><b>Status:</b> <?= $status ?></p>
        </div>
    </div>

    <div class="flight">
        <img src="images/korea.jpg" alt="South Korea">
        <div class="details">
            <p><b>Flight:</b> INT205</p>
            <p><b>From:</b> Clark</p>
            <p><b>To:</b> South Korea</p>
            <p><b>Status:</b> <?= $status ?></p>
        </div>
    </div>

</div>

<!-- ================= FOOTER ================= -->
<footer class="footer">
    <h3>🌍 World Time</h3>
    <p>🇵🇭 Philippines: <?= $ph_time->format("h:i A"); ?></p>
    <p>🇯🇵 Japan: <?= $jp_time->format("h:i A"); ?></p>
    <p>🇨🇳 China: <?= $cn_time->format("h:i A"); ?></p>
    <p>🇺🇸 USA (New York): <?= $us_time->format("h:i A"); ?></p>
</footer>

</div>
</body>
</html>
