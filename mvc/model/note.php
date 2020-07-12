<?
class NoteModel{
    public static function insert($title, $description, $userId){
        $db = Db::getInstance();
        $db -> insert("INSERT INTO x_note (title, description, user_id, isDone) VALUES 
                                          ('$title','$description','$userId', false)");

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
}