<?php

function load_data_siswa()
{
    return json_decode(file_get_contents('data/siswa.json'), true);
}

function calculate_rata_rata($siswa)
{
    $total = 0;
    foreach ($siswa as $siswa) {
        $total += $siswa['nilai'];
    }
    return $total / count($siswa);
}

function calculate_jumlah_lulus($siswa)
{
    $jumlah_lulus = 0;
    foreach ($siswa as $siswa) {
        if ($siswa['nilai'] >= 6) {
            $jumlah_lulus++;
        }
    }
    return $jumlah_lulus;
}

function cetak_table($siswa)
{
    foreach($siswa as $s)
    {
        echo "<tr>";
        echo "<td>" . $s['nama'] . "</td>";
        echo "<td>" . $s['nilai'] . "</td>";
        echo "<td>" . ($s['nilai'] >= 6 ? "Lulus" : "Tidak Lulus") . "</td>";
        echo "</tr>";
    }
}

$siswa = load_data_siswa();


$rata_rata = calculate_rata_rata($siswa);
$jumlah_lulus = calculate_jumlah_lulus($siswa);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Data Siswa</title>
</head>
<body>
    <table border='1'>
        <tr>
            <th>Nama</th>
            <th>Nilai</th>
            <th>Status</th>
        </tr>
        <?php cetak_table($siswa); ?>
    </table>
    <p>Rata-rata: <?php echo $rata_rata; ?></p>
    <p>Jumlah Lulus: <?php echo $jumlah_lulus; ?></p>
</body>
</html>