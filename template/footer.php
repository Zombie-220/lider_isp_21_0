<?php
    function render_footer($copyright, $name, $year) {
        echo "
            <footer>
                <p class='footer__p'>$copyright $name $year год</p>
            </footer>
        ";
    }
?>