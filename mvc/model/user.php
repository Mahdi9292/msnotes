<?php
class UserModel {
  public static function insert($email, $name, $nickname, $hashedPassword, $time, $time2){
    $db = Db::getInstance();
    $db->insert("INSERT INTO x_user
      (  email,  fullname,  nickname,    password, registerTime, lastVisitTime) VALUES
      ('$email', '$name', '$nickname', '$hashedPassword',  '$time',     '$time2')"
    );
  }

  public static function fetch_by_email($email){
    $db = Db::getInstance();
    $record = $db->first("SELECT * FROM x_user WHERE email='$email'");
    return $record;
  }

  public static function promote_user($userId, $access){
      $db = Db::getInstance();
      $db->modify("UPDATE x_user SET access = '$access' WHERE user_id = $userId ");
  }

    public static function get_user_access($userId){
        $db = Db::getInstance();
        $record = $db->first("SELECT access FROM x_user WHERE user_id = $userId");
        return $record;
    }
}