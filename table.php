<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Matej Štajduhar</title>
</head>
<body>
    <!-- border-colapse used so <td> won't have spaces  -->
    <table style="border-collapse: collapse;">
        <?php
        //if directly opened table.php it will redirect to index.html
        if(!isset($_POST['num'])){
            header('Location: index.html');
        }

        //after first larger num than average change to false
        $firstAfterAvg = true;

        //test if it is empty to jump over because there is no data to show
        if(trim($_POST['num']) != "") {

            //get string combination with num and ','
            $string = $_POST['num'];

            //remove all characters except num and ,
            $string = preg_replace('/[^0-9,]/', '', $string);

            //store numbers from string into array seperated by coma
            $array = explode(',', $string);

            //2 for loops for to create grid 16 x 16
            for ($a = 0; $a < 16; $a++) {
                echo '<tr>';
                for ($b = 0; $b < 16; $b++) {

                    //using max inside sqrt to get width and hight needed
                    echo '<td style="border: 1px solid; width: ', sqrt(max($array)) + 1, 'px; height: ', sqrt(max($array)) + 1, 'px;">';
                    foreach ($array as $i) {

                        //check if num of field is equal to num in array
                        //added $i * 1 so it will look at $i as integer instead of string to be able to use === operator
                        //step above gives same result as intval() function but everyone will use that function
                        if ($a * 16 + $b + 1 === $i * 1 && $i % 2 === 0) {
                            if ($firstAfterAvg && $i > array_sum($array) / count($array)) {
                                echo '<b>', $i, '</b>';
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
        }else{
            echo '<h1>No data has been received!</h1>';
        }
        ?>
    </table>
    <hr>
    <?php

    //test if it is empty to jump over because there is no data to show
    if(trim($_POST['num']) != "") {
        print_r($array);
        echo '<br>';
        echo 'Average: ', array_sum($array) / count($array), '<br>';
        echo 'Cell size: ', sqrt(max($array)) + 1, '<br>';
    }else {
        echo '<h1>No data has been received!</h1>';
    }
    ?>
</body>
</html>