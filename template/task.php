<?php
    function render_task($taskName, $taskNumber, $taskWording, $buttonName, $inputNames, $placeholderArrays) {
        echo "
            <div class='main__task'>
                <p class='main__task__header'>Задача $taskNumber</p>
        ";

        preg_match("/png/", $taskWording, $matches);
        if ($matches == array()) {
            echo "
                <p class='main__task__text'>$taskWording</p>
            ";
        } else {
            echo "
                <img class='main__task__img' src=$taskWording alt='image_task'>
            ";
        }
        echo "<form method='post'>";
        for ($i = 0; $i < count($inputNames); $i++) { echo"<input type=text name=$inputNames[$i] placeholder=$placeholderArrays[$i]>"; }
        echo "
                <button type='submit' name=$buttonName>Выполнить</button>
            </form>
        ";
        $taskName($buttonName, $inputNames);
        echo "</div>";
    }
?>
