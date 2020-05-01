<?php
require_once 'class/OpenWeather.php';
$weather = new OpenWeather('633d66bdf3631f86d6a027fe3f6ebed0');
$forcaste = $weather->getForecast('Montpellier,fr');
$today = $weather->getToday('Montpellier,fr');
?>

<ul>
    <li>En ce moment <?= $today['description'] ?> <?= $today['temp'] ?> °C</li>
    <?php foreach ($forcaste as $day): ?>
        <li><?= $day['date']->format('d/m/Y') ?> <?= $day['description'] ?> <?= $day['temp'] ?> °C</li>
    <?php endforeach ?>
</ul>