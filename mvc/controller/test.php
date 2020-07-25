<?
class TestController{
    public function test1($number){
        $db= Db::getInstance();
        for ($i=0; $i<$number; $i++ ){
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

    public function regex(){
        echo '<meta charset="utf-8"><style>body { font-family: tahoma }</style>';
        $source = "<div>this is sample url: ftp://google.com/something/test and another url = http://microsoft.com/answers/?topic=140 and nothing else ftptest hello ftp end https://google.com and http://uncox.com/question/1222/یک-سئوال-عجیب  and ftps://test.com/test and another http://microsoft/test </div>";
        echo $source;
    
        hr();
        $changedSource = preg_replace("/((?:ht|f)tp(?:|s):\/\/[a-zA-Z0-9]+\.[a-zA-Z0-9]+.*?)\s/", '<a href="$1">Link</a> ', $source);
        echo $changedSource;
      }

      public function convertDate ($date, $format = 'y-M-d'){
          echo jdate($date, $format);
      }
}