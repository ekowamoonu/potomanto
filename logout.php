<?php ob_start();
session_start();

/*if(isset($_SESSION['login_id']))
{
$_SESSION['login_id']=null;
session_destroy();
header("Location: login");
}*/

if(isset($_COOKIE['log']))
{
setcookie("log","",time()-10);
header("Location: login");
}

?>