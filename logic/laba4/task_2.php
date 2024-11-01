<?php
    $task_2 = function($buttonName, $inputNames) {
        if (isset($_POST[$buttonName])) {
            $a = (float)$_POST[$inputNames[0]];
            $b = (float)$_POST[$inputNames[1]];
            if ($a > $b) {
                $temp = $a;
                $a = $b;
                $b = $temp;
            }
            echo "<p class='solution'>A = $a<BR>B = $b</p>";
        }
    }
?>