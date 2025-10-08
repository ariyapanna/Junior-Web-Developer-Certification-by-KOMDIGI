<?php

$a = 10;
$b = 5;

function swap(&$a, &$b)
{
    $temp = $a;
    $a = $b;
    $b = $temp;
}

echo "Nilai a sebelum dilakukan swap: $a <br>";
echo "Nilai b sebelum dilakukan swap: $b <br>";

swap($a, $b);

echo "Nilai a setelah dilakukan swap: $a <br>";
echo "Nilai b setelah dilakukan swap: $b <br>";