<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <!-- border-colapse used so <td> won't have spaces  -->
    <table style="border-collapse: collapse;">
        <?php
        for($a = 0; $a <16; $a++) {
            echo '<tr>';
            for ($b = 0; $b < 16; $b++) {
                echo '<td style="border: 1px solid;">';

                echo '</td>';
            }
            echo '</tr>';
        }
        ?>
    </table>
</body>
</html>