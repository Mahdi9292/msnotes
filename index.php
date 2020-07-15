<?php
define('test', true);

require_once(getcwd(). '/system/loader.php'); //Salam Mehd

$uri = getRequestUri();
$uri = str_replace(baseUrl() . '/', '/', $uri);

$parts = explode('/', $uri);
$controller = $parts[1];
$method = $parts[2];

$params = array();
for ($i=3; $i<count($parts); $i++){
  $params[] = $parts[$i];
}

$controllerClassname = ucfirst($controller) . "Controller";
$controllerInstance = new $controllerClassname();
call_user_func_array(array($controllerInstance, $method), $params);
