<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width='device-width', initial-scale=1.0">
    <title>For Loop</title>
</head>
<body>
    <h1>For Loop</h1>
    <?php
        for($i = 1; $i <= 10; $i++)
        {
            echo $i ** 2 . "<br>";
        }
    ?>

    <br>
    <h1>Decrement</h1>
    <?php
        for($i = 10; $i >= 1; $i--)
        {
            echo $i . "<br>";
        }
    ?>
</body>
</html>