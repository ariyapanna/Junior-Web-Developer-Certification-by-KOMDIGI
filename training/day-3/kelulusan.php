<?php
    $nilai = array(6, 7, 4, 8, 7);
    $siswa = array("Cecep", "Asep", "Tatang", "Oyat", "Taryana");

    $rata_rata = 0;
    $jumlah_lulus = 0;


    function hitung_jumlah_lulus($nilai)
    {
        $jumlah_lulus = 0;

        for($i = 0; $i < count($nilai); $i++)
        {
            if($nilai[$i] >= 6) $jumlah_lulus++;
        }

        return $jumlah_lulus;
    }

    function cetak_table($siswa)
    {
        global $nilai;
        for($i = 0; $i < count($siswa); $i++)
        {
            $is_pass = $nilai[$i] >= 6;

            echo "<tr>";
            echo "<td>" . $siswa[$i] . "</td>";
            echo "<td>" . $nilai[$i] . "</td>";
            echo "<td>" . ($is_pass ? "Lulus" : "Tidak Lulus") . "</td>";
            echo "</tr>";
        }
    }

    function hitung_total_dan_rata_rata($nilai, &$total, &$rata_rata)
    {
        for($i = 0; $i < count($nilai); $i++)
        {
            $total += $nilai[$i];
        }
        $rata_rata = $total / count($nilai);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Kelulusan</title>
    <style>
        table {
            border-collapse: collapse;
        }

        td {
            text-align: center;
        }
    </style>
</head>
<body>
    <table border="1">
        <tr>
            <th>Nama</th>
            <th>Nilai</th>
            <th>Status</th>
        </tr>
        <?php
            cetak_table($siswa);
            hitung_total_dan_rata_rata($nilai, $total, $rata_rata);
            $jumlah_lulus = hitung_jumlah_lulus($nilai);
        ?>
    </table>
    <span>Total Nilai: <?= $total ?></span>
    <br>
    <span>Rata-rata: <?= $rata_rata ?></span>
    <br>
    <span>Jumlah Siswa Lulus: <?= $jumlah_lulus ?></span>
</body>
</html>