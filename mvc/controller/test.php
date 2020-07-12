<?
class TestController{
    public function test1(){
        $db= Db::getInstance();
        for ($i=0; $i<100; $i++ ){
            $title = "sometitle" . $i;
            $description = "some description" . $i;
            $isDone = false;
            $db -> insert("INSERT INTO x_note (user_id, title, description, isDone) VALUES (5, '$title', '$description', 'isDone')");
            
        }
    }
}