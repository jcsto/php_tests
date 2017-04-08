<?php
header('Content-Type: text/html; charset=utf-8');
echo 'Argumentos variables de declaración de tipo<br> ';

function total_intervals($unit, DateInterval ...$intervals) {
    $time = 0;
    foreach ($intervals as $interval) {
        $time += $interval->$unit;
    }
    return $time;
}

$a = new DateInterval('P1D');
$b = new DateInterval('P2D');
echo total_intervals('d', $a, $b).' days';

// Esto fallará, debido a que  null no es un objeto de DateInterval.
echo total_intervals('d', null);
?>
