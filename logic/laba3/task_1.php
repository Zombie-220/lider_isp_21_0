<?php
    $task_1 = function($buttonName, $inputNames) {
        if (isset($_POST[$buttonName])) {
            $a = $_POST[$inputNames[0]];
            $b = $_POST[$inputNames[1]];
            if ((is_numeric($a) && is_numeric($b))) {
                $average = ($a + $b) / 2;
                echo "<p class='solution'> Среднее арифметическое = $average</p>";
            } else {
                echo "<p class='solution'>Данные введены не корректно</p>";           
            }
        }
    }
?>