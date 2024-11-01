<?php
    $task_2 = function($buttonName, $inputNames) {
        if (isset($_POST[$buttonName])) {
            $M = (int)$_POST[$inputNames[0]];
            $N = (int)$_POST[$inputNames[1]];

            for ($i = 0; $i < $M; $i++) {
                $row = [];
                for ($j = 0; $j < $N; $j++) {
                    $row[] = rand(-10, 10);
                }
                $matrix[] = $row;
            }

            echo "Исходная матрица: [";
            printMatrix($matrix);
            echo " ]";

            $reflectedMatrix = [];
            for ($i = 0; $i < $M; $i++) {
                $reflectedMatrix[] = $matrix[$M - 1 - $i];
            }

            echo "<BR>Отраженная матрица: [";
            printMatrix($reflectedMatrix);
            echo " ]";
        }
    }
?>