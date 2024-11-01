<?php
    function printMatrix($matrix) {
        foreach ($matrix as $elem) {
            echo " [";
            foreach($elem as $matrixElem) {
                echo "$matrixElem ";
            }
            echo "]";
        }
    }

    $task_1 = function($buttonName, $inputNames) {
        if (isset($_POST[$buttonName])) {
            $M = (int)$_POST[$inputNames[0]];
            $N = (int)$_POST[$inputNames[1]];
            $matrix = [];

            for ($i = 0; $i < $M; $i++) {
                $row = [];
                for ($j = 0; $j < $N; $j++) {
                    $row[] = rand(-10, 10);
                }
                $matrix[] = $row;
            }
            
            echo "<p class='solution'>Исходный массив: [ ";
            printMatrix($matrix);
            echo " ]<BR>";
            
            echo "Результат: [ ";
            for ($i = 1; $i < count($matrix); $i += 2) {
                echo "[";
                for ($j = 0; $j < count($matrix[$i]); $j++) {
                    echo $matrix[$i][$j] . ' ';
                }
                echo "] ";
            }
            echo " ]</p>";
        }
    }
?>