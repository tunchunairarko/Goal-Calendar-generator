<?php
session_start();
include_once('inc/dbConnect.inc.php');
$message=array();
$uname=$_POST['uname'];
$password=$_POST['password'];


$countError=count($message);

if($countError > 0){
     for($i=0;$i<$countError;$i++){
              echo ucwords($message[$i]).'<br/><br/>';
     }
}else{
    $query="SELECT * FROM superuser WHERE username='$uname' and password='$password'";
    $res=mysqli_query($con,$query);
    $checkUser=mysqli_num_rows($res);
    
    if($checkUser > 0){
         $_SESSION['LOGIN_STATUS']=true;
         $_SESSION['UNAME']=$uname;
         $_SESSION['goals']=array();
         $_SESSION['curgoal']=0;
         //I should write a function later
         echo 'correct';
    }else{
         echo ucwords('please enter correct user details');
    }
}
?>

