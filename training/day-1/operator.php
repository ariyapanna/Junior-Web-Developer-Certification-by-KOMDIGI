<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operator</title>
</head>
<body>
    <h1>Numeric Operator</h1>
    <span>1. Operator Penjumlahan (+):</span> 
    <?php
        $a = 10;
        $b = 5;
        echo "Hasil penjumlahan a(10) + b(5) adalah: $a + $b = ", $a + $b;
    ?>

    <br>
    <span>2. Operator Pengurangan (-):</span> 
    <?php
        $a = 10;
        $b = 5;
        echo "Hasil pengurangan a(10) - b(5) adalah: $a - $b = ", $a - $b;
    ?>

    <br>
    <span>3. Operator Perkalian (*):</span> 
    <?php
        $a = 10;
        $b = 5;
        echo "Hasil perkalian a(10) * b(5) adalah: $a * $b = ", $a * $b;
    ?>

    <br>
    <span>4. Operator Pembagian (/):</span> 
    <?php
        $a = 10;
        $b = 5;
        echo "Hasil pembagian a(10) / b(5) adalah: $a / $b = ", $a / $b;
    ?>

    <br>
    <span>5. Operator Modulus (%):</span> 
    <?php
        $a = 10;
        $b = 5;
        echo "Hasil modulus a(10) % b(5) adalah: $a % $b = ", $a % $b;
    ?>

    <br>
    <span>6. Operator Perpangkatan (**):</span> 
    <?php
        $a = 10;
        $b = 5;
        echo "Hasil perpangkatan a(10) ** b(5) adalah: $a ** $b = ", $a ** $b;
    ?>

    <br>
    <h5>NOTE: Hasil pembagian dan operasi yang melibatkan tipe data float akan menghasilkan float</h5>

    <h1>String Operator</h1>
    <span>1. Concatenation Operator (.)</span>
    <?php
        $a = "Hello";
        $b = "World";
        echo "Hasil concatenation $a . $b = ", $a . $b;
    ?>

    <h1>Comparison Operator</h1>
    <span>1. Equal to Operator (==)</span>
    <?php
        $a = 10;
        $b = 10;
        echo "Hasil perbandingan a(10) == b(10) adalah: $a == $b = ", $a == $b;
    ?>

    <h1>Logical Operator</h1>
    <span>1. Logical AND Operator (&&)</span>
    <?php
        $a = true;
        $b = false;
        echo "Hasil perbandingan a(true) && b(false) adalah: $a && $b = ", $a && $b;
    ?>

    <br>
    <span>2. Logical OR Operator (||)</span>
    <?php
        $a = true;
        $b = false;
        echo "Hasil perbandingan a(true) || b(false) adalah: $a || $b = ", $a || $b;
    ?>
</body>
</html>