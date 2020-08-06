<?
class NoteModel{
    public static function insert($title, $description, $userId, $date){
        $db = Db::getInstance();
        $db -> insert("INSERT INTO x_note (title, description, user_id, isDone, eventTime) VALUES 
                                          ('$title','$description','$userId', false, '$date')");

    }

    public static function remove($noteId, $userId){
        $db = Db::getInstance();
        $db-> modify ("DELETE FROM  x_note WHERE note_id= $noteId AND user_id = $userId "); 
    }

    public static function toggle ($noteId, $userId){
        $db = Db::getInstance();
        $db-> modify ("UPDATE x_note SET isDone = NOT isDone WHERE note_id= $noteId AND user_id = $userId ");
    }

    public static function catalog($userId){
        $db = Db::getInstance();
        $records= $db-> query("SELECT * FROM x_note WHERE user_id = $userId");
        return $records;
    }

    public static function catalogByPage($userId, $startIndex, $count){
        $db = Db::getInstance();
        $records= $db-> query("SELECT * FROM x_note WHERE user_id = $userId LIMIT $startIndex, $count");
        return $records;
    }

    public static function countNotes($userId){
        $db = Db::getInstance();
        $records= $db-> query("SELECT COUNT(*) AS total FROM x_note WHERE user_id = $userId");
        return $records[0]['total'];
    }


    public static function getNoteID($userId){
        $db = Db::getInstance();
        $records = $db-> query("SELECT note_id FROM x_note WHERE user_id = $userId ORDER BY note_id DESC LIMIT 1");
        return $records[0];
    }
}