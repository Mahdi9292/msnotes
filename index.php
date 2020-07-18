<?php
define('test', true);

require_once(getcwd() . '/system/loader.php'); //Salam Mehd

$uri = getRequestUri();
$uri = str_replace(baseUrl() . '/', '/', $uri);

# I use regex below based on $config['route'] ==> also see config.php
$route = $config['route'];
$uri= urldecode($uri);
foreach ($route as $alias => $target) {
  $alias = '^' . $alias; //==> in baraye regex ast
  $alias = str_replace('/', '\/', $alias); //==> in ham baraye regex ast
  $alias = str_replace('*', '(.*)', $alias);//==> in ham baraye regex ast
  if (preg_match('/'.$alias.'/' , $uri)) {
    $uri = preg_replace('/'.$alias.'/', $target, $uri);
  }

}

$parts = explode('/', $uri);
$controller = $parts[1];
$method = $parts[2];

$params = array();
for ($i = 3; $i < count($parts); $i++) {
  $params[] = $parts[$i];
}

$controllerClassname = ucfirst($controller) . "Controller";
$controllerInstance = new $controllerClassname();
call_user_func_array(array($controllerInstance, $method), $params);
