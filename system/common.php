<?php
function hr($return = false){
  if ($return){
    return "<hr>\n";
  } else {
    echo "<hr>\n";
  }
}

function br($return = false){
  if ($return){
    return "<br>\n";
  } else {
    echo "<br>\n";
  }

}

function dump($var, $return = false){
  if (is_array($var)){
    $out = print_r($var, true);
  } else if (is_object($var)) {
    $out = var_export($var, true);
  } else {
    $out = $var;
  }

  if ($return){
    return "\n<pre style='direction: ltr'>$out</pre>\n";
  } else {
    echo "\n<pre style='direction: ltr'>$out</pre>\n";
  }
}

function getCurrentDateTime(){
  return date("Y-m-d H:i:s");
}

function encryptPassword($password){
  global $config;
  return md5($password . $config['salt']);
}

function getFullUrl(){
  $fullurl = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
  return $fullurl;
}

function getRequestUri(){
  return $_SERVER['REQUEST_URI'];
}

function baseUrl(){
  global $config;
  return $config['base'];
}

function fullBaseUrl(){
  global $config;
  return 'http://' . $_SERVER['HTTP_HOST'] . $config['base'];
}

function strhas($string, $search, $caseSensitive = false){
  if ($caseSensitive){
    return strpos($string, $search) !== false;
  } else {
    return strpos(strtolower($string), strtolower($search)) !== false;
  }
}

function message($type, $message, $mustExit = false) {
  $data['message'] = $message;
  View::render("/message/$type.php", $data);
  if ($mustExit){
    exit;
  }
}