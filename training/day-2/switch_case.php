<?php

    $indeks = 'A';
    echo 'Indeks: ' . $indeks . '<br>';

    switch($indeks)
    {
        case 'A':
            echo 'Sangat Baik';
            break;
        case 'B':
            echo 'Baik';
            break;
        case 'C':
            echo 'Cukup';
            break;
        case 'D':
            echo 'Kurang';
            break;
        default:
            echo 'Tidak Lulus';
            break;
    }

?>