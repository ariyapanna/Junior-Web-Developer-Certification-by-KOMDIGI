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
            for($i = 0; $i < count($siswa); $i++)
            {
                $is_pass = $nilai[$i] >= 6;

                echo "<tr>";
                echo "<td>" . $siswa[$i] . "</td>";
                echo "<td>" . $nilai[$i] . "</td>";
                echo "<td>" . ($is_pass ? "Lulus" : "Tidak Lulus") . "</td>";
                echo "</tr>";

                $rata_rata += $nilai[$i];
            }
            $jumlah_lulus = hitung_jumlah_lulus($nilai);
        ?>
    </table>
    <span>Rata-rata: <?= $rata_rata / count($siswa) ?></span>
    <br>
    <span>Jumlah Siswa Lulus: <?= $jumlah_lulus ?></span>
</body>
</html>