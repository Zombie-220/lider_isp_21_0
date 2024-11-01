<?php
    $task_1 = function($buttonName, $inputNames) {
        if (isset($_POST[$buttonName])) {
            $N = (int)$_POST[$inputNames[0]];
            $K = (int)$_POST[$inputNames[1]];
            $array[] = array();
            $solution = "N = $N, K = $K<BR>Массив: [";

            for ($i=0; $i<$N; $i++) {
                $number = mt_rand(-10, 10);
                $array[] = $number;
                $solution .= " $number";
            }
            $solution .= " ]<BR>";

            $solution .= "Результат:";
            for ($i=$K; $i<=$N; $i+=$K) {
                $solution .= " $array[$i]";
            }
            echo "<p class='solution'>$solution</p>";
        }
    }
?>