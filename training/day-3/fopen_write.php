<?php

$users = [];

$file_path = 'data/users.json';

/**
 * Seeds dummy data into the users.json file.
 *
 * The function takes no arguments and uses the global $file_path variable
 * to write the dummy data into the file.
 *
 * The dummy data consists of two users: John Doe, a 30 year old male, and
 * Jane Doe, a 25 year old female.
 */

function seed_data()
{
    global $file_path;
    $dummy_data = [
        [
            'name' => 'John Doe',
            'age' => 30,
            'gender' => 'male'
        ],
        [
            'name' => 'Jane Doe',
            'age' => 25,
            'gender' => 'female'
        ]
    ];

    $output_file = fopen($file_path, 'w');
    fwrite($output_file, json_encode($dummy_data, JSON_PRETTY_PRINT));
    fclose($output_file);
}

/**
 * Loads the data from the users.json file into the global $users variable.
 *
 * This function opens the users.json file in read mode, reads the contents of the file, 
 * decodes the JSON data into an associative array, stores the array into the global $users variable, 
 * and closes the file.
 * 
 * The function takes no arguments and uses the global $file_path variable to determine the path to the file.
 */
function load_data()
{
    global $file_path, $users;

    $target_file = fopen($file_path, 'r');
    $data = fread($target_file, filesize($file_path));
    $users = json_decode($data, true);
    fclose($target_file);
}

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    seed_data();
    load_data();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Open & Write to JSON</title>
</head>
<style>
    body {
        display: flex;
        justify-content: center;
    }

    .container {
        width: 300px;
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 50px;
        padding: 12px;
        gap: 20px;
        border: 1px solid gray;
    }

    table {
        border-collapse: collapse;
    }

    table td {
        text-align: center;
        padding: 12px;
    }
</style>
<body>
    <div class="container">
        <h1 style="text-align: center;">File Open, Write as JSON, and Display</h1>
        <form method="post">
            <button type="submit">Load Data</button>
        </form>
        <?php
            if(!empty($users))
            {
        ?>
        <table border='1'>
            <tr>
                <th>Name</th>
                <th>Age</th>
                <th>Gender</th>
            </tr>
            <?php
                foreach($users as $user)
                {
                    echo "<tr>";
                    echo "<td>" . $user['name'] . "</td>";
                    echo "<td>" . $user['age'] . "</td>";
                    echo "<td>" . $user['gender'] . "</td>";
                    echo "</tr>";
                }
            }
            ?>
        </table>
    </div>
</body>
</html>