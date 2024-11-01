<?php
    $task_2 = function($buttonName, $inputNames) {
        if (isset($_POST[$buttonName])) {
            $number = $_POST[$inputNames[0]];
            if ($number >= 10 && $number <= 99) {
                $firstDigit = intdiv($number, 10);
                $secondDigit = $number % 10;
                $newNumber = $secondDigit * 10 + $firstDigit;
                echo "<p class='solution'>Результат: $newNumber</p>";
            } else { echo "<p class='solution'>Введенное число не является двузначным.</p>"; }
        }
    }
?>