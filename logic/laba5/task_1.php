<?php
    $task_1 = function($buttonName, $inputNames) {
        if (isset($_POST[$buttonName])) {
            $N = (int)$_POST[$inputNames[0]];
            $collection = [];
            $arrayHasMinus = FALSE;
            for ($i=0; $i<$N; $i++) {
                $randNumber = mt_rand();
                $randomNumberSymbol = mt_rand(0, 1) ? 1 : -1;
                $collection[] = $randNumber * $randomNumberSymbol;
            }
            for ($i=0; $i<count($collection); $i++) {
                echo "<p>Элемент №$i: $collection[$i]</p>";
                if ($collection[$i] < 0) {
                    $arrayHasMinus = TRUE;
                }
            }
            echo "<p class='solution'>Массив ". ($arrayHasMinus? "имеет": "не имеет") ." отрицательные элементы.</p>";
        }
    }
?>