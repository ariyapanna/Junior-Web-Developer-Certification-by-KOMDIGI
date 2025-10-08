<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Open & Read</title>
</head>
<body>
    <h1>Read File Content</h1>
    <?php
        $target_file = fopen('data/webdictionary.txt', 'r');
        echo fread($target_file, filesize('data/webdictionary.txt'));
        fclose($target_file);
    ?>

    <h1>Read Single Line</h1>
    <?php
        $target_file = fopen('data/webdictionary.txt', 'r');
        echo fgets($target_file);
        fclose($target_file);
    ?>

    <?php
    ?>
</body>
</html>

<?php 

