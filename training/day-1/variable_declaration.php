<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variable Declaration</title>
</head>
<body>
    <span>1. Declare Variable a and assign value integer 3:</span> 
    <br>
    <?php
        echo "Nilai a sebelum dilakukan assignment: <br>", $a;
        $a = 3;
        echo "Nilai a sesudah dilakukan assignment: $a";
    ?>

    <br>
    <br>
    <span>2. Declare Variable b and assign value float 3:</span> 
    <br>
    <?php
        echo "Nilai b sebelum dilakukan assignment: <br>", $b;
        $b = 3.0;
        echo "Nilai b sesudah dilakukan assignment: $b";
    ?>

    <br>
    <br>
    <span>3. Declare Variable c and assign value string "Hello World":</span> 
    <br>
    <?php
        echo "Nilai c sebelum dilakukan assignment: <br>", $c;
        $c = "Hello World";
        echo "Nilai c sesudah dilakukan assignment: $c";
    ?>
</body>
</html>