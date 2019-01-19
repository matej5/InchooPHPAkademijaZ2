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
        //after first larger num than average change to false
        $firstAfterAvg = true;
        //get string combination with num and ','
        $string = $_POST['num'];
        //store numbers from string into array seperated by coma
        $array = explode(',', $string);

        //2 for loops for to create grid 16 x 16
        for($a = 0; $a <16; $a++) {
            echo '<tr>';
            for ($b = 0; $b < 16; $b++) {
                echo '<td style="border: 1px solid; width: 20px; height: 20px;">';
                    foreach ($array as $i) {
                        //check if num of field is equal to num in array
                        if ($a * 16 + $b + 1 == $i && $i%2 == 0) {
                            if($firstAfterAvg && $i > array_sum($array)/count($array)){
                                echo '<b>',$i,'</b>';
                                $firstAfterAvg = false;
                                break;
                            }

                            echo $i;
                            //if there are multple num of same values we need to echo only
                            break;
                        }
                    }
                echo '</td>';
            }
            echo '</tr>';
        }
        ?>
    </table>
    <hr>
    <?php
    echo 'Average: ',array_sum($array)/count($array);
    ?>
</body>
</html>