<?php
class EditableUserTable extends UserTable {
    public function editUser($userId, $newName = null) {
        foreach ($this->users as &$user) {
            if ($user['id'] == $userId) {
                if ($newName != null) {
                    $user['name'] = $newName;
                }
                return;
            }
        }
        echo "User $userId not found.<BR>";
    }
}
?>