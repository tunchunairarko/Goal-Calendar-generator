<?php
    session_start();
    
    $emcount=0;
    $ckdone=0;
    $goals=array();
    $_SESSION['goals']=NULL;
    $_SESSION['goals']=array();
    $_SESSION['curgoal']=NULL;
    $_SESSION['curgoal']=0;
    if($_POST['goal1']!=""){
        $ckdone++;
        $emcount++;
        array_push($_SESSION['goals'],$_POST['goal1']);
    }
    else{
        $ckdone++;
    }
    if($_POST['goal2']!=""){
        $ckdone++;
        $emcount++;
        array_push($_SESSION['goals'],$_POST['goal2']);
    }
    else{
        $ckdone++;
    }
    if($_POST['goal3']!=""){
        $ckdone++;
        $emcount++;
        array_push($_SESSION['goals'],$_POST['goal3']);
    }
    else{
        $ckdone++;
    }
    if($_POST['goal4']!=""){
        $ckdone++;
        $emcount++;
        array_push($_SESSION['goals'],$_POST['goal4']);
    }
    else{
        $ckdone++;
    }
    if($_POST['goal5']!=""){
        $ckdone++;
        $emcount++;
        array_push($_SESSION['goals'],$_POST['goal5']);
    }
    else{
        $ckdone++;
    }
    
    if($ckdone==5 && $emcount==0){
        echo 'all_empty';
    }
    else if($ckdone==5 && $emcount!=0){
        $result=array('response'=>'go_on','goal'=>$_SESSION['goals'][$_SESSION['curgoal']],'curgoal'=>(string)($_SESSION['curgoal']+1));
        echo json_encode($result);
        
    }   
?>