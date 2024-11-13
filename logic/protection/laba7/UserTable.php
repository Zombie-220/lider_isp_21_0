<?php
class UserTable {

    public $users;

    public function __construct() {
        $this->users = [
            ["id" => 1, "name" => "user_name_1"],
            ["id" => 2, "name" => "user_name_2"],
            ["id" => 3, "name" => "user_name_3"],
            ["id" => 4, "name" => "user_name_4"],
            ["id" => 5, "name" => "user_name_5"]
        ];
    }

    public function renderTable() {
        echo "ID - Name<BR>";
        foreach ($this->users as $user) {
            echo "{$user['id']} - {$user['name']}<BR>";
        }
    }
}
?>