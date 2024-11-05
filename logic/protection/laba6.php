<?php
    $task = function($buttonName) {
        if (isset($_POST[$buttonName])) {
            $array = [];
            for ($i = 0; $i < 10; $i++) {
                $array[] = rand(0, 10);
            }
            echo "<p class='solution'>Массив: " . implode(", ", $array) . "<BR>";
            $max = max($array);
            $min = min($array);
            $average = array_sum($array) / count($array);
            
            echo "Наибольший элемент: $max<BR>";
            echo "Наименьший элемент: $min<BR>";
            echo "Среднее арифметическое: $average</p>";
        }
    }
?>