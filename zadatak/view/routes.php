<?php 

require_once '../controllers/Controller.php';

$controller=new Controller();

$page=isset($_GET['page'])?$_GET['page']:"";
switch($page){
case'showlogin':
$controller->showLogin();
break;

case'showregister':
$controller->showRegister();
break;

case'showlogout':
$controller->logout();
break;

case'showhome':
$controller->showhome();
break;


}
if($_SERVER['REQUEST_METHOD']=='POST'){
$page=isset($_POST['page'])?$_POST['page']:"";
    switch($page){

    case'Register':
    $controller->registration();
    break;

    case'Log in':
    $controller->login();
    break;
        

    }
}
?>