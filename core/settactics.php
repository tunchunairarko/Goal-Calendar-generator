<?php
session_start();
function checkFirstEntry($val){
    if($val==0){
        $_SESSION['tactics']=NULL;
        $_SESSION['tactics']=array();
        $_SESSION['weekinfo']=NULL;
        $_SESSION['weekinfo']=array();
    }
}



//checkFirstEntry($_SESSION['curgoal']);
$myfile = fopen("newfile3.txt", "w+") or die("Unable to open file!");
$dat=$_POST['data'];
fwrite($myfile,$dat);
fclose($myfile);
array_push($_SESSION['tactics'],$dat);
$wtc=$_POST['weeksToComplete'];
$sw=$_POST['startWeek'];
array_push($_SESSION['weekinfo'],array('weeksToComplete'=>$wtc,'startWeek'=>$sw));

$goalSize=count($_SESSION['goals']);
if($_SESSION[curgoal]+1<$goalSize){
    $_SESSION['curgoal']++;
    $result=array('response'=>'incomplete','goal'=>$_SESSION['goals'][$_SESSION['curgoal']],'curgoal'=>(string)($_SESSION['curgoal']+1));
    echo json_encode($result);
}
else{
    $result=array('response'=>'complete','goal'=>'','curgoal'=>'');
    echo json_encode($result);
}

?>