<?php
    $task_2 = function($buttonName, $inputNames) {
        if (isset($_POST[$buttonName])) {
            $A = (int)$_POST[$inputNames[0]];
            $B = (int)$_POST[$inputNames[1]];
            if ($A > $B) {
                echo "<p class='solution error_message'>Не вополняется условие: $A &lt; $B</p>";
            } else {
                $summ = 0;
                for ($i=$A; $i<$B+1; $i++) {
                    $quad = pow($i, 2);
                    $summ += $quad;
                }
                echo "<p class='solution'>A = $A<BR>B = $B<BR>Реузльтат: $summ</p>";
            }
        }
    }
?>