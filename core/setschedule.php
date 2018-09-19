<?php

session_start();
function getWeekday($date) {
    return date('w', strtotime($date));
}
$conn=mysqli_connect('localhost','goalsnoh_hassle','vIo2PMIR4LM-[G6E+.','goalsnoh_hassledb');
mysqli_query($conn,'TRUNCATE TABLE schedule');


$time = strtotime($_POST['startdate']);

$newformat = date('Y-m-d',$time);
$_SESSION['startdate']=$newformat;
$_SESSION['monday']=$_POST['monday'];
$_SESSION['tuesday']=$_POST['tuesday'];
$_SESSION['wednesday']=$_POST['wednesday'];
$_SESSION['thursday']=$_POST['thursday'];
$_SESSION['friday']=$_POST['friday'];
$_SESSION['saturday']=$_POST['saturday'];

$_SESSION['enddate']=date('Y-m-d', strtotime($_SESSION['startdate']. ' + 84 days'));

$created=date('Y-m-d H:i:s');

$myfile = fopen("newfile.txt", "w+") or die("Unable to open file!");
fwrite($myfile,$created);
for($i=0; $i<=84; $i++){
    $curdate=date('Y-m-d', strtotime($_SESSION['startdate']. ' + '.$i.' days'));
    $weekDay=getWeekday($curdate);
    /*
    fwrite($myfile, $curdate.' ');
    fwrite($myfile, $weekDay);
    fwrite($myfile,'\n');
    */
    if($weekDay==1){
        mysqli_query($conn,"INSERT INTO schedule (title,date,created,modified,status) VALUES ('".$_SESSION['monday']."','".$curdate."','".$created."','".$created."','1')");
    }
    else if($weekDay==2){
        mysqli_query($conn,"INSERT INTO schedule (title,date,created,modified,status) VALUES ('".$_SESSION['tuesday']."','".$curdate."','".$created."','".$created."','1')");
    }
    else if($weekDay==3){
        mysqli_query($conn,"INSERT INTO schedule (title,date,created,modified,status) VALUES ('".$_SESSION['wednesday']."','".$curdate."','".$created."','".$created."','1')");
    }
    else if($weekDay==4){
        mysqli_query($conn,"INSERT INTO schedule (title,date,created,modified,status) VALUES ('".$_SESSION['thursday']."','".$curdate."','".$created."','".$created."','1')");
    }
    else if($weekDay==5){
        mysqli_query($conn,"INSERT INTO schedule (title,date,created,modified,status) VALUES ('".$_SESSION['friday']."','".$curdate."','".$created."','".$created."','1')");
    }
    else if($weekDay==6){
        mysqli_query($conn,"INSERT INTO schedule (title,date,created,modified,status) VALUES ('".$_SESSION['saturday']."','".$curdate."','".$created."','".$created."','1')");
    }
    
    
}

mysqli_close($conn);


$result=array('response'=>'sc_complete','scheduleArray'=>'done');
echo json_encode($result);
fclose($myfile);

?>