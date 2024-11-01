<?php
    $task_1 = function($buttonName, $inputNames) {
        if (isset($_POST[$buttonName])) {
            $a = (int)$_POST[$inputNames[0]];
            $b = (int)$_POST[$inputNames[1]];
            echo "<p>a = $a b = $b</p>";
            if (($a % 2 == 0 && $b % 2 == 0)) {
                echo "<p class='solution'>Оба числа четные</p>";
            } else if ($a % 2 != 0 && $b % 2 != 0) {
                echo "<p class='solution'>Оба числа не четные</p>";
            } else {
                echo "<p class='solution'>Одно из чисел не четное</p>";
            }
        }
    }
?>