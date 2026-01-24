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

$arrTime = (clone $dep)->add(new DateInterval("PT85M"));
$duration = $dep->diff($arrTime);

// Status
if ($nowPH < $dep) {
    $status = "Upcoming";
} elseif ($nowPH > $arrTime) {
    $status = "Arrived";
} else {
    $status = "In Air";
}

$tokyoZone   = new DateTimeZone("Asia/Tokyo");
$chinaZone   = new DateTimeZone("Asia/Shanghai");
$indiaZone   = new DateTimeZone("Asia/Kolkata");
$germanyZone = new DateTimeZone("Europe/Berlin");
$koreaZone   = new DateTimeZone("Asia/Seoul");
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

<?php
$domestic = [
    ["DOM101","Manila","Baguio","images/baguio.jpg"],
    ["DOM102","Manila","Clark","images/clark.png"],
    ["DOM103","Clark","Palawan","images/palawan.jpg"],
    ["DOM104","Manila","Batangas","images/batangas.jpg"],
    ["DOM105","Cebu","Mindanao","images/mindanao.jpg"]
];

foreach ($domestic as $d):
?>
<div class="flight">
    <img src="<?= $d[3] ?>" alt="">
    <div class="details">
        <p><b>Flight:</b> <?= $d[0] ?></p>
        <p><b>From:</b> <?= $d[1] ?></p>
        <p><b>To:</b> <?= $d[2] ?></p>

      
        <p><b>Departure:</b> <?= $dep->format("M d, Y h:i A") ?> (Asia/Manila)</p>
        <p><b>Arrival:</b> <?= $arrTime->format("M d, Y h:i A") ?> (Asia/Manila)</p>
        <p><b>Duration:</b> <?= $duration->h ?>h <?= $duration->i ?>m</p>

        <p><b>Status:</b> <?= $status ?></p>
    </div>
</div>
<?php endforeach; ?>

</div>

<!-- ================= INTERNATIONAL ================= -->
<h2>International Flights</h2>
<div class="flight-grid international">

<?php
$international = [
    ["INT201","Manila","Japan","images/osaka.jpg",$tokyoZone],
    ["INT202","Manila","China","images/china.webp",$chinaZone],
    ["INT203","Manila","India","images/india.jpg",$indiaZone],
    ["INT204","Manila","Germany","images/germany.webp",$germanyZone],
    ["INT205","Clark","South Korea","images/korea.jpg",$koreaZone]
];

foreach ($international as $i):
    $arrIntl = clone $arrTime;
    $arrIntl->setTimezone($i[4]);
?>
<div class="flight">
    <img src="<?= $i[3] ?>" alt="">
    <div class="details">
        <p><b>Flight:</b> <?= $i[0] ?></p>
        <p><b>From:</b> <?= $i[1] ?></p>
        <p><b>To:</b> <?= $i[2] ?></p>

       
        <p><b>Departure:</b> <?= $dep->format("M d, Y h:i A") ?> (Asia/Manila)</p>
        <p><b>Arrival:</b> <?= $arrIntl->format("M d, Y h:i A") ?></p>
        <p><b>Duration:</b> <?= $duration->h ?>h <?= $duration->i ?>m</p>
        <p><b>Timezone:</b> <?= $i[4]->getName() ?></p>

        <p><b>Status:</b> <?= $status ?></p>
    </div>
</div>
<?php endforeach; ?>

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
