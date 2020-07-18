<?
class TestController{
    public function test1(){
        $db= Db::getInstance();
        for ($i=200; $i<210; $i++ ){
            $title = "sometitle" . $i;
            $description = "some description" . $i;
            $isDone = false;
            $db -> insert("INSERT INTO x_note (user_id, title, description, isDone) VALUES (5, '$title', '$description', 'isDone')");
            
        }

        $records =$db-> query ("SELECT * FROM x_note WHERE user_id = 5");
        dump ($records);

        $reverse= array_reverse($records);
        dump ($reverse);
    }
}