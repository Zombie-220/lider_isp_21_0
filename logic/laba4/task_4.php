<?php
    $task_4 = function($buttonName, $inputNames) {
        if (isset($_POST[$buttonName])) {
            $a = 1.8;
            $b = 3.3;
            $x = (float)$_POST[$inputNames[0]];
            switch ($x) {
                case 3:
                    $y = ($a*$x+1)**4;
                    break;
                case 4:
                    $y = 1 / (2*$x**2+$b*log10($x));
                    break;
                case 6:
                    $y = $a*cos($b+$x)**2;
                    break;
                default:
                    $y = "Введённое значение не подходит под решение";
                    break;
            }
            echo "<p class='solution'>Введённый результат: $x<BR>Результат: $y</p>";
        }
    }
?>