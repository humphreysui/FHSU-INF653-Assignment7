<?php 

$_SESSION = array(); 
session_destroy();
$name = session_name();
$expire = strtotime('-1 year'); 
$params = session_get_cookie_params();
$path = $params['path'];
setcookie($name, '', $expire, $path);

?>

//TODO: Logout message page