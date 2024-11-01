<?php
    function render_header($labName = NULL) {
        echo "
            <header>
                <p class='logo'>Оптимизация web-приложений.
        ";
        if ($labName !== NULL) { echo "Лаба №$labName.</p><a href='../index.php'>Назад</a>"; }
        echo "
            </header>
        ";
    }
?>