<?php
class View {
  public static function render($filePath, $data = array()){
    extract($data);

    ob_start();
    require_once(getcwd()."/mvc/view" . $filePath);
    $content = ob_get_clean();

    require_once(getcwd()."/theme/default.php");
  }
}