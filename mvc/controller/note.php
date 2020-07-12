<?
class NoteController{
    public function submit(){
        if (isset($_POST['title'])){
            $this->submitNote();
        }else{
            View::render("/note/submit.php");
        }
        
    }

    private function submitNote(){
        $title = $_POST['title'];
        $description=  $_POST['description'];


        if (!isset($_SESSION['user_id'])){
            header ("Location: /notes-v2/page/home ");
            exit;
        }

        $userId= $_SESSION['user_id'];

        NoteModel::insert($title, $description, $userId);
        
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

}