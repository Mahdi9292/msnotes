<?php

class AdminController{
    public function __construct()
    {
        grantAdmin();
    }

    public function promote_user_form(){
        View::render("/admin/promote_user.php");
    }

    public function getUserAccess($userId){
        $output = UserModel::get_user_access($userId);
        if (count($output) == 0){$output['access'] = "";}
        echo json_encode($output);
    }

    public function promote(){
        $userId = $_POST['userId'];
        $access = $_POST['access'];
        $access = str_replace(' ', '', $access);
        $access = '|' . str_replace(',', '|', $access) . '|';
        UserModel::promote_user($userId, $access);
        echo "You have successfully updated Useer Access !";
        echo "<a class='btn-blue' href='/notes-v2/admin/promote_user_form'>" . "Return" . "</a>";
    }
}