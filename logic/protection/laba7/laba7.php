<?php
    require 'UserTable.php';
    require 'EditableUserTable.php';

    $task = function($buttonName) {
        if (isset($_POST[$buttonName])) {
            echo "<p class='solution'>";
            $userTable = new UserTable();
            $userTable->renderTable();
            
            echo "<BR>";
            $editableUserTable = new EditableUserTable();
            $editableUserTable->renderTable();
            
            $editableUserTable->editUser(2, "test44");
            echo "<BR>";
            $editableUserTable->editUser(10, "test4111");
            
            echo "<BR>";
            $editableUserTable->renderTable();     
            echo "</p>";
        }
    }
?>