<?php
    $message = '';

    function categorize($nilai)
    {
        if($nilai >= 85)
            return 'A';
        else if($nilai >= 70)
            return 'B';
        else if($nilai >= 60)
            return 'C';
        else if($nilai >= 55)
            return 'D';
        else
            return 'E';
    }

    function handleSubmit()
    {
        $uts = $_POST['uts'];
        $uas = $_POST['uas'];
        $tugas = $_POST['tugas'];
        if(empty($uts) || empty($uas) || empty($tugas))
            return 'Please fill out all the fields';

        if(($uts < 0 || $uts > 100) || ($uas < 0 || $uas > 100) || ($tugas < 0 || $tugas > 100))
            return 'Nilai tidak valid';

        $result = ($uts * 0.4) + ($uas * 0.4) + ($tugas * 0.2);
        return 'Nilai akhir anda adalah: ' . $result . ' dengan kategori ' . categorize($result);
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        $message = handleSubmit();

        $uts = $_POST['uts'];
        $uas = $_POST['uas'];
        $tugas = $_POST['tugas'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulasi Nilai</title>
    <style>
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 50px;
        }

        form {
            padding: 12px 24px;
            border: 1px solid gray;
            border-radius: 6px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .input-group {
            display: flex;
            justify-content: space-between;
            gap: 20px;
        }

        #result {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <form method="post">
            <h1>Form Kalkukasi Nilai Akhir</h1>
            <div class="input-group">
                <label for="uts">Nilai UTS:</label>
                <input type="number" id="uts" name="uts" value="<?php echo $uts; ?>">
            </div>
            <div class="input-group">
                <label for="uas">Nilai UAS:</label>
                <input type="number" id="uas" name="uas" value="<?php echo $uas; ?>">
            </div>
            <div class="input-group">
                <label for="tugas">Nilai Tugas:</label>
                <input type="number" id="tugas" name="tugas" value="<?php echo $tugas; ?>">
            </div>
            <input type="submit" value="Kalkulasi" name="submit">
        </form>
        <span id="result"><?php echo $message; ?></span>
    </div>
</body>
</html>