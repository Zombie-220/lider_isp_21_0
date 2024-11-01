<?php
    $task_3 = function($buttonName, $inputNames) {
        if (isset($_POST[$buttonName])) {
            $a = 1.8;
            $b = 3.3;
            $x = (float)$_POST[$inputNames[0]];
            if ($x <= 3) {
                $y = ($a*$x+1)**4;
            } else if ($x > 3 && $x <=5) {
                $y = 1 / (2*$x**2+$b*log10($x));
            } else if ($x > 5) {
                $y = $a*cos($b+$x)**2;
            } else {
                $y = "Введёное число не попадает ни в один диапозон";
            }
            echo "<p class='solution'>Введено значение: $x<BR>Результат: $y</p>";
        }
    }
?>