<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nested Loop (Tabel Perkalian)</title>
    <style>
        table {
            border-collapse: collapse;
        }

        td {
            text-align: center;
            padding: 6px;
        }
    </style>
</head>
<body>
    <table border="1">
        <tr>
            <td> * </td>
            <?php
                for($i = 1; $i <= 10; $i++)
                {
                    echo "<th>";
                    echo $i;
                    echo "</th>";
                }
            ?>
        </tr>

        <?php
            for($i = 1; $i <= 10; $i++) 
            {
                echo "<tr>";
                echo "<th>" . "$i" . "</th>";
                for($j = 1; $j <= 10; $j++)
                {
                    echo "<td>";
                    echo  $i * $j;
                    echo "</td>";
                }
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>