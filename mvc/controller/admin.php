<?php

class AdminController{
    public function __construct()
    {
        grantAdmin();
    }

    public function promote_user_form(){
        View::render("/admin/promote_user.php");
    }

    public function getUserAccessByUserId($userId){
        $output = UserModel::get_user_access_by_user_id($userId);
        if (count($output) == 0){$output['access'] = "";}
        echo json_encode($output);
    }

    public function getUserAccessByEmail($email){
        $output = UserModel::get_user_access_by_email($email);
        if (count($output) == 0){$output['access'] = "";}
        echo json_encode($output);
    }

    #For PHP base
    /*
    public function promote(){
        $userId = $_POST['userId'];
        $access = $_POST['access'];
        $access = str_replace(' ', '', $access);
        $access = '|' . str_replace(',', '|', $access) . '|';
        UserModel::promote_user($userId, $access);
        echo "You have successfully updated User Access !";
        echo "<a class='btn-blue' href='/notes-v2/admin/promote_user_form'>" . "Return" . "</a>";
    }
    */

    #For ajax base
    public function promoteByUserId($userId, $access){
        $access = str_replace(' ', '', $access);
        $access = '|' . str_replace(',', '|', $access) . '|';
        UserModel::promote_user($userId, $access);

        $message = "You have successfully updated User Access !";
        echo json_encode($message);
        return;
    }

    public function promoteByEmail($email, $access){
        $access = str_replace(' ', '', $access);
        $access = '|' . str_replace(',', '|', $access) . '|';
        UserModel::promote_user_by_email($email, $access);

        $message = "You have successfully updated User Access !";
        echo json_encode($message);
        return;
    }

    public function adminPage(){

    }
}