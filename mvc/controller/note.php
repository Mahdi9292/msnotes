<?
class NoteController{

    public function submit(){
        if (isset($_POST['title'])){
            $this->submitNote();
        }else{
            View::render("/note/submit.php");
        }

//        if (isset($title) && $title != null){
//            $this->submitNote($title, $description);
//        }else{
//            View::render("/note/submit.php");
//        }

    }

    private function submitNote(){
        $title = $_POST['title'];
        $description=  $_POST['description'];


        if (!isset($_SESSION['user_id'])){
            header ("Location: /notes-v2/page/home ");
            exit;
        }


        $userId= $_SESSION['user_id'];
        $date = $date = date('l jS \of F Y h:i:s A');

        NoteModel::insert($title, $description, $userId, $date);

//        echo json_encode(array(
//            'title'=> $title,
//            'description'=> $description,
//            'date'=> $date,
//            'user_id'=>$userId,
//        ));

        header("Location: /notes-v2/page/home");
        exit;

    }

    public function remove($noteId){
        if (!isset($_SESSION['user_id'])){
            header ("Location: /notes-v2/page/home ");
            exit;
        }

        $userId = $_SESSION['user_id'];
        NoteModel::remove($noteId, $userId);
        // header ("Location: /notes-v2/page/home ");
        echo json_encode(array(
            'status'=> true,
        ));
    }
    public function toggle($noteId){
        if (!isset($_SESSION['user_id'])){
            // header ("Location: /notes-v2/page/home "); chon unvar JQuery darim dg b redirect niaz nadarim
            exit; // Jquery exit mishe na dg kole poroje ya page
        }
        $userId = $_SESSION['user_id'];
        NoteModel::toggle($noteId, $userId);
        // header ("Location: /notes-v2/page/home ");
        echo json_encode(array(
            'status'=> true,
        ));
    }



    public function catalog($pageIndex){
        if (!isset($_SESSION['user_id'])){
            exit;
        }

        // $isGuest = !isset($_SESSION['email']);
        $userId = $_SESSION['user_id'];

        $count = 10;
        $startIndex = ($pageIndex - 1) * $count;
        $data['records']= NoteModel::catalogByPage($userId, $startIndex, $count);
        $recordsCount= NoteModel::countNotes($userId);
        $data['pageCount']= ceil($recordsCount /10);
        $data['pageIndex'] = $pageIndex;
        // dump ($records);

        View::render("/page/catalog.php", $data);
    }

    public function ajaxCatalog($pageIndex){
        if (!isset($_SESSION['user_id'])){
            exit;
        }
        // $isGuest = !isset($_SESSION['email']);
        $userId = $_SESSION['user_id'];

        $count = 10;
        $startIndex = ($pageIndex - 1) * $count;
        $data['records']= NoteModel::catalogByPage($userId, $startIndex, $count);
        $recordsCount= NoteModel::countNotes($userId);
        $data['pageCount']= ceil($recordsCount /10);
        $data['pageIndex'] = $pageIndex;
//        dump ($data['records']);

        ob_start();
        View::renderPartial("/page/ajaxCatalog.php", $data);
//        dump($data['records']);
        $output = ob_get_clean();

        echo json_encode(array(
            'status'=> true,
            'html'=> $output,
        ));

    }
}


