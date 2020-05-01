<?php
require_once 'class/OpenWeather.php';
$weather = new OpenWeather('633d66bdf3631f86d6a027fe3f6ebed0');
$forcaste = $weather->getForecast('Montpellier,fr');
?>

<ul>
    <?php foreach($forcaste as $data): ?>
        <li><?= $data['date']->format('d/m/Y') ?> <?= $data['description'] ?> <?= $data['temp'] ?> °C</li>
    <?php endforeach ?>
</ul>