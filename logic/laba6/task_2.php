<?php
    $task_2 = function($buttonName, $inputNames) {
        if (isset($_POST[$buttonName])) {
            $N = (int)$_POST[$inputNames[0]];
            $array = array();
            $solution = "Массив: [";
            $lastNumber = -11;

            for ($i=0; $i<$N; $i++) {
                $newNumber = mt_rand(-10, 10);
                $array[] = $newNumber;
                if ($newNumber%2 != 0) { $lastNumber=$newNumber; }
                $solution .= " $newNumber";
            }
            $solution .= " ]<BR>Новый массив: [";

            if ($lastNumber != -11) {
                for ($i=0; $i<$N; $i++) {
                    if ($array[$i]%2 != 0) {  $array[$i] = $array[$i] + $lastNumber; }
                    $solution .= " $array[$i]";
                }
                $solution .= " ]";
            }
            echo "<p class='solution'>$solution</p>";
        }
    }
?>