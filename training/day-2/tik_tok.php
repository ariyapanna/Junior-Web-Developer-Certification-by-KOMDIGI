<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tik Tok Program</title>
</head>
<body>
    <h1>Print Tik or Tok if number is divisible by 3 or 5</h1>
    <?php
        for($i = 1; $i <= 20; $i++)
        {
            if($i % 3 == 0 && $i % 5 == 0) echo 'Tik Tok <br>';
            else if($i % 3 == 0)  echo 'Tik <br>';
            else if($i % 5 == 0) echo 'Tok <br>';
            else echo $i . '<br>';
        }
    ?>
</body>
</html>