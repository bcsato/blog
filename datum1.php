<?php
$date = new DateTime("now", new DateTimeZone("Europe/Paris"));
echo $date->format(DateTime::ISO8601) . PHP_EOL; // 2016-12-08T10:42:59+0100

$datei = DateTimeImmutable::createFromFormat(DateTime::ISO8601, $date->format(DateTime::ISO8601));
echo $datei->format(DateTime::ISO8601) . PHP_EOL; // 2016-12-08T10:42:59+0100
?>