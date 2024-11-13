
<!--
1. написать класс для отрисовки таблицы списка пользователей, список создан заранее в конструкторе
2. создать дочерний класс на основе родительского из прошлого задания с возможностью редактирования пользователей
-->

<?php
include './UserTable.php';
include './EditableUserTable.php';

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
?>