<?
if (!defined('test')) { echo "Forbidden Request"; exit; }

global $config;
$config['db']['host'] = 'localhost';
$config['db']['user'] = 'DBUSER';
$config['db']['pass'] = 'DBPASS';
$config['db']['name'] = 'DBNAME';

$config['lang'] = 'en';

$config['salt'] = 'suya9s8ydaiu987vqo28bv9q87B87VPq7E98QVB';
$config['base'] = '/notes-v2';

$config['route'] = array(
    '/login' => '/user/login',
    '/profile/*' => '/user/profile/$1',
    '/wächßen' => '/user/login'
);