<?php
    $message = '';

    function handleSubmit()
    {
        if(empty($_POST['firstname']) || empty($_POST['lastname']))
            return 'Please fill out all the fields';

        return 'Hello ' . $_POST['firstname'] . ' ' . $_POST['lastname'];
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST')
        $message = handleSubmit();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic Input Output</title>
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
    </style>
</head>
<body>
    <div class="container">
        <form method="post">
            <h1>Basic Form</h1>
            <div class="input-group">
                <label for="firstname">Firstname:</label>
                <input type="text" name="firstname" id="firstname">
            </div>
            <div class="input-group">
                <label for="lastname">Lastname:</label>
                <input type="text" name="lastname" id="lastname">
            </div>
            <input type="submit" value="Submit">
        </form>
        <span><?php echo $message; ?></span>
    </div>
</body>
</html>