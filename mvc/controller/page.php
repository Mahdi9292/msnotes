<?php
class PageController
{
  public function home()
  {
    $isGuest = !isset($_SESSION['email']);

    if (!$isGuest) {
      $user_id = $_SESSION['user_id'];
      $data['records'] = NoteModel::catalog($user_id);
    } else {
      $data['records'] = null;
    }

    $data['isGuest'] = $isGuest;
    View::render("/page/home.php", $data);
  }

  public function adminPage(){
      grantAdmin();
      $data['records'] = UserModel::fetch_all_users();
      View::render("/page/admin_page.php", $data);
  }
}
