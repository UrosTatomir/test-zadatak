<?php
require_once '../model/DAO.php';


// require_once '../classes/Mailer.php';

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
// require '../vendor/autoload.php';


class Controller{
public function showhome(){
    include 'index.php';
}
public function showLogin(){
    $register=0;
    include 'login.php';
}
public function showRegister(){
    $register=1;
    include 'login.php';
}
public function registration(){
   $name=isset($_POST['name'])?$_POST['name']:"";
   $surname=isset($_POST['surname'])?$_POST['surname']:"";
   $email=isset($_POST['email'])?$_POST['email']:"";
   $password=isset($_POST['password'])?$_POST['password']:"";
   $confirmpassword=isset($_POST['confirmpassword'])?$_POST['confirmpassword']:"";

   $errors=array();

   if(empty($name)){
       $errors['name']= "You need to enter a tname";
   }
   if(empty($surname)){
       $errors['surname']= "You need to enter a surname";
   }
   if(empty($email)){
       $errors['email']= "You need to enter a email";

   }else{

     if(filter_var($email, FILTER_VALIDATE_EMAIL)==false){
         $errors['email']= "You need to enter a valid email";
     }else{
         $dao=new DAO();
         $mail=$dao->getAllUsers();
         foreach($mail as $m){
             if($m['email']==$email){
              $errors['email']= "This email already exists, please enter another email";
             }
         }
     }
   }
   if(empty($password)){
       $errors['password']="You need to enter password";
   }
   if(empty($confirmpassword)){

       $errors['confirmpassword']= "You need to confirm the password";

   }else{ 
       if ($password !== $confirmpassword){

                $errors['confirmpassword'] = "Password fields do not match";
            }
        }
   if(count($errors)==0){
       $password = password_hash($password,PASSWORD_BCRYPT, array('cost'=>12));

       $dao=new DAO();
       $active=1;
       
       $dao->register($name,$surname,$email,$password,$active);
       $msg= "You have successfully registered, please log in";
       $register=0;
       include 'login.php';
   }else{

      $msg= "You need to enter the data correctly in the form ";
      $register=1;
      include 'login.php';
   }
}
public function login(){
    $name=isset($_POST['name'])?$_POST['name']:"";
    $password=isset($_POST['password'])?$_POST['password']:"";
    
        if(!empty($name) && !empty($password)){
            $dao=new DAO();
            $student=$dao->login($name);
           $id_user=$student['id_user'];

            if(!empty($student)){

                if(password_verify($password,$student['password'])&&$student['active']==1){
                
                    session_start();
                    $_SESSION['student']=$student;
                    //----CMS
                    $getgrades=$dao->getStudGrades($id_user);
                    $r=0;
                    $grade=0;
                    $value['grade']=0;
                    foreach($getgrades as $value){
                    $r++;
                    $grade=$value['grade']+$grade;
                    
                    }
                    $CMS=$grade/$r;
                    $CMS_json=json_encode($CMS);
                    //----
                    //--CMSB
                    if($r > 2){
                    
                        sort($getgrades);
                        unset($getgrades[0]);
                        $CMSB=max($getgrades);
                        $CMSB_json=json_encode($CMSB);
                    }elseif($r = 2){
                        $CMSB=max($getgrades);
                        $CMSB_json=json_encode($CMSB);
                    }elseif($r=1){
                        $CMSB=$getgrades[0];
                        $CMSB_json=json_encode($CMSB);
                    }

                
                
                
                // var_dump($getgrades);die();

                //-----
                include 'index.php';

                }else{
                    $register=0;
                    $msg= "Incorrect name or password";
                    include 'login.php';
                }
            }else{
                $register=0;
                $msg= "name or password does not exist";
                include 'login.php';
            }    
          
        }else{
        $msg= "You must enter name and password";
        include 'login.php';
        }
}
public function logout(){
    session_start();
    unset($_SESSION['student']);
    include 'login.php';
}






}//end Controller






?>