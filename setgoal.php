<?php
    session_start();
    $_SESSION['curgoal']=0;
    $_SESSION['goals']=array();
    $emcount=0;
    if($_POST['goal1']!==NULL){
        $emcount++;
        array_push($_SESSION['goals'],$_POST['goal1']);
    }    
    if($_POST['goal2']!==NULL){
        $emcount++;
        array_push($_SESSION['goals'],$_POST['goal2']);
    }
    if($_POST['goal3']!==NULL){
        $emcount++;
        array_push($_SESSION['goals'],$_POST['goal3']);
    }
    if($_POST['goal4']!==NULL){
        $emcount++;
        array_push($_SESSION['goals'],$_POST['goal4']);
    }
    if($_POST['goal5']!==NULL){
        $emcount++;
        array_push($_SESSION['goals'],$_POST['goal5']);
    }
    
    if($emcount==0){
        echo 'all_empty';
    }
    else{
        echo 'go_on';
    }    
?>