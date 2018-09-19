<?php
session_start();

function castOut($dateOfStart,$estTime,$weekHours,$daysToCastOut){
    //this is only to map the dates
    $newMappedDates=array();
    $newHours=array();
    
    for($i=0;$i<$count(weekHours);$i++){ //$d is usually 7
        if($castedOut==$daysToCastOut){
            break;
        }
        $dateNow=date('Y-m-d', strtotime($dateOfStart. ' + '.$i.' days'));
        $ha=$sortedDates[$dateNow];
        $availableTime=$ha*60;
        if($availableTime==0){
            continue;
        }
        else if($estTime>$availableTime){
            continue;
        }
        array_push($newHours,array($dateNow=>$ha));
    }
    if(count($newHours)-$daysToCastOut>0){
        $sortedDates=asort($newHours);
        for($i==count($newHours)-$daysToCastOut-1;$i>=0;$i--){
            $dateNow=date('Y-m-d', strtotime($dateOfStart. ' + '.$i.' days'));
            $key=array_search($newHours[$dateNow]);
            array_push($newMappedDates,$key);
        }
        return $newMappedDates;
    }
    else{
        return $newMappedDates;
    }

    
    
}
function placeInCalendar($name,$estTime,$quantity,$INTENSITY,$dateOfStart,$dateOfEnd,&$activityCalendar, &$calendarHours){
    if((int)$quantity==84){
        $dateRange=date_diff($dateOfEnd,$dateOfStart);
        for($i=0; $i<$dateRange;$i++){
            $dateNow=date('Y-m-d', strtotime($dateOfStart. ' + '.$i.' days'));
            array_push($activityCalendar,array($newDat[$i]=>''.$name.' 1 time for'.$estTime));
        }
    }
    else if((int)$quantity==168){
        $dateRange=date_diff($dateOfEnd,$dateOfStart);
        for($i=0; $i<$dateRange;$i++){
            $dateNow=date('Y-m-d', strtotime($dateOfStart. ' + '.$i.' days'));
            array_push($activityCalendar,array($newDat[$i]=>''.$name.' 2 times for'.$estTime));
        }
    }
    else if((int)$quantity==252){
        $dateRange=date_diff($dateOfEnd,$dateOfStart);
        for($i=0; $i<$dateRange;$i++){
            $dateNow=date('Y-m-d', strtotime($dateOfStart. ' + '.$i.' days'));
            array_push($activityCalendar,array($newDat[$i]=>''.$name.' 3 times for'.$estTime));
        }
    }
    //Non daily parts begin here
    else if((int)$quantity==72){
        //Technically cast out one day from each week righ
        $dateRange=date_diff($dateOfEnd,$dateOfStart);
        $newDat=array();
        for($i=0; $i<$dateRange;$i=$i+7){
            $d0=date('Y-m-d', strtotime($dateOfStart. ' + '.$i.' days'));
            $d1=date('Y-m-d', strtotime($dateOfStart. ' + '.($i+1).' days'));
            $d2=date('Y-m-d', strtotime($dateOfStart. ' + '.($i+2).' days'));
            $d3=date('Y-m-d', strtotime($dateOfStart. ' + '.($i+3).' days'));
            $d4=date('Y-m-d', strtotime($dateOfStart. ' + '.($i+4).' days'));
            $d5=date('Y-m-d', strtotime($dateOfStart. ' + '.($i+5).' days'));
            
            $weekHours=array($d0=>$calendarHours[$d0],$d1=>$calendarHours[$d1],$d2=>$calendarHours[$d2],$d3=>$calendarHours[$d3],$d4=>$calendarHours[$d4],$d5=>$calendarHours[$d5]);
            $newDat=castOut($dateOfStart,$estTime,$weekHours,1);
        }
        for($i=0;$i<count($newDat);$i++){
            array_push($activityCalendar,array($newDat[$i]=>''.$name.' for'.$estTime));
        }
    }
    else if((int)$quantity==60){
        $dateRange=date_diff($dateOfEnd,$dateOfStart);
        $newDat=array();
        for($i=0; $i<$dateRange;$i=$i+7){
            $d0=date('Y-m-d', strtotime($dateOfStart. ' + '.$i.' days'));
            $d1=date('Y-m-d', strtotime($dateOfStart. ' + '.($i+1).' days'));
            $d2=date('Y-m-d', strtotime($dateOfStart. ' + '.($i+2).' days'));
            $d3=date('Y-m-d', strtotime($dateOfStart. ' + '.($i+3).' days'));
            $d4=date('Y-m-d', strtotime($dateOfStart. ' + '.($i+4).' days'));
            $d5=date('Y-m-d', strtotime($dateOfStart. ' + '.($i+5).' days'));
            
            $weekHours=array($d0=>$calendarHours[$d0],$d1=>$calendarHours[$d1],$d2=>$calendarHours[$d2],$d3=>$calendarHours[$d3],$d4=>$calendarHours[$d4],$d5=>$calendarHours[$d5]);
            $newDat=castOut($dateOfStart,$estTime,$weekHours,2);
        }
        for($i=0;$i<count($newDat);$i++){
            array_push($activityCalendar,array($newDat[$i]=>''.$name.' for'.$estTime));
        }
    }
    else if((int)$quantity==48){
        $dateRange=date_diff($dateOfEnd,$dateOfStart);
        $newDat=array();
        for($i=0; $i<$dateRange;$i=$i+7){
            $d0=date('Y-m-d', strtotime($dateOfStart. ' + '.$i.' days'));
            $d1=date('Y-m-d', strtotime($dateOfStart. ' + '.($i+1).' days'));
            $d2=date('Y-m-d', strtotime($dateOfStart. ' + '.($i+2).' days'));
            $d3=date('Y-m-d', strtotime($dateOfStart. ' + '.($i+3).' days'));
            $d4=date('Y-m-d', strtotime($dateOfStart. ' + '.($i+4).' days'));
            $d5=date('Y-m-d', strtotime($dateOfStart. ' + '.($i+5).' days'));
            
            $weekHours=array($d0=>$calendarHours[$d0],$d1=>$calendarHours[$d1],$d2=>$calendarHours[$d2],$d3=>$calendarHours[$d3],$d4=>$calendarHours[$d4],$d5=>$calendarHours[$d5]);
            $newDat=castOut($dateOfStart,$estTime,$weekHours,3);
        }
        for($i=0;$i<count($newDat);$i++){
            array_push($activityCalendar,array($newDat[$i]=>''.$name.' for'.$estTime));
        }
    }
    else if((int)$quantity==36){
        $dateRange=date_diff($dateOfEnd,$dateOfStart);
        $newDat=array();
        for($i=0; $i<$dateRange;$i=$i+7){
            $d0=date('Y-m-d', strtotime($dateOfStart. ' + '.$i.' days'));
            $d1=date('Y-m-d', strtotime($dateOfStart. ' + '.($i+1).' days'));
            $d2=date('Y-m-d', strtotime($dateOfStart. ' + '.($i+2).' days'));
            $d3=date('Y-m-d', strtotime($dateOfStart. ' + '.($i+3).' days'));
            $d4=date('Y-m-d', strtotime($dateOfStart. ' + '.($i+4).' days'));
            $d5=date('Y-m-d', strtotime($dateOfStart. ' + '.($i+5).' days'));
            
            $weekHours=array($d0=>$calendarHours[$d0],$d1=>$calendarHours[$d1],$d2=>$calendarHours[$d2],$d3=>$calendarHours[$d3],$d4=>$calendarHours[$d4],$d5=>$calendarHours[$d5]);
            $newDat=castOut($dateOfStart,$estTime,$weekHours,4);
        }
        for($i=0;$i<count($newDat);$i++){
            array_push($activityCalendar,array($newDat[$i]=>''.$name.' for'.$estTime));
        }
    }
    else if((int)$quantity==24){
        $dateRange=date_diff($dateOfEnd,$dateOfStart);
        $newDat=array();
        for($i=0; $i<$dateRange;$i=$i+7){
            $d0=date('Y-m-d', strtotime($dateOfStart. ' + '.$i.' days'));
            $d1=date('Y-m-d', strtotime($dateOfStart. ' + '.($i+1).' days'));
            $d2=date('Y-m-d', strtotime($dateOfStart. ' + '.($i+2).' days'));
            $d3=date('Y-m-d', strtotime($dateOfStart. ' + '.($i+3).' days'));
            $d4=date('Y-m-d', strtotime($dateOfStart. ' + '.($i+4).' days'));
            $d5=date('Y-m-d', strtotime($dateOfStart. ' + '.($i+5).' days'));
            
            $weekHours=array($d0=>$calendarHours[$d0],$d1=>$calendarHours[$d1],$d2=>$calendarHours[$d2],$d3=>$calendarHours[$d3],$d4=>$calendarHours[$d4],$d5=>$calendarHours[$d5]);
            $newDat=castOut($dateOfStart,$estTime,$weekHours,5);
        }
        for($i=0;$i<count($newDat);$i++){
            array_push($activityCalendar,array($newDat[$i]=>''.$name.' for'.$estTime));
        }
    }
    else if((int)$quantity==12){
        $dateRange=date_diff($dateOfEnd,$dateOfStart);
        $newDat=array();
        for($i=0; $i<$dateRange;$i=$i+7){
            $d0=date('Y-m-d', strtotime($dateOfStart. ' + '.$i.' days'));
            $d1=date('Y-m-d', strtotime($dateOfStart. ' + '.($i+1).' days'));
            $d2=date('Y-m-d', strtotime($dateOfStart. ' + '.($i+2).' days'));
            $d3=date('Y-m-d', strtotime($dateOfStart. ' + '.($i+3).' days'));
            $d4=date('Y-m-d', strtotime($dateOfStart. ' + '.($i+4).' days'));
            $d5=date('Y-m-d', strtotime($dateOfStart. ' + '.($i+5).' days'));
            
            $weekHours=array($d0=>$calendarHours[$d0],$d1=>$calendarHours[$d1],$d2=>$calendarHours[$d2],$d3=>$calendarHours[$d3],$d4=>$calendarHours[$d4],$d5=>$calendarHours[$d5]);
            $newDat=castOut($dateOfStart,$estTime,$weekHours,6);
        }
        for($i=0;$i<count($newDat);$i++){
            array_push($activityCalendar,array($newDat[$i]=>''.$name.' for'.$estTime));
        }
    }
    /*
    $dateRange=date_diff($dateOfEnd,$dateOfStart);
    for($i=0; $i<$dateRange;$i++){
        $dateNow=date('Y-m-d', strtotime($dateOfStart. ' + '.$i.' days'));
        //aage check koro je aar ki ki activity ase
        $ha=$activityCalendar[$dateNow]['hours'];
        $availableTime=$ha*60;
        //now check koro je eta ki daily activity type kina
        if((int)$quantity==84){ //aro kaaj ase pagla mone rakhish
            //then kono verification er e dorkar nai
            //just add calmly
            array_push($activityCalendar[$dateNow]['activities'],(''.$name.' 1 time for'.$estTime)); 
        }
        else if((int)$quantity==168){ //aro kaaj ase pagla mone rakhish
            //then kono verification er e dorkar nai
            //just add calmly
            array_push($activityCalendar[$dateNow]['activities'],(''.$name.' 2 times for'.$estTime)); 
        }
        
        else if((int)$quantity==252){ //aro kaaj ase pagla mone rakhish
            //then kono verification er e dorkar nai
            //just add calmly
            array_push($activityCalendar[$dateNow]['activities'],(''.$name.' 1 time for'.$estTime)); 
        }
        //ekhon baki jegula ase egula daily activity na. So eikhane ashtese khela
        //so tomake prottekta re dhoira dhoira agaite hobe
        for($j=$i;$j<$i+7;$j++){
            $dateNow=date('Y-m-d', strtotime($dateOfStart. ' + '.$j.' days'));
            $ha=$activityCalendar[$dateNow]['hours'];
            $availableTime=$ha*60;
            if((int)$hoursAvailable!=0||(int)$hoursAvailable>(int)$estTime){
                if((int)$quantity==72){
                    
                }
            }
        }
        */
        /*
        if((int)$hoursAvailable!=0||(int)$hoursAvailable>(int)$estTime){
            //shudhu taholei activity add kora jabe
            //so ekhon amra add kori
            
        }*/
        //$availableHours=$activityCalendar[$dateNow];
        
    
}
function generateIntensity($estTime,$quantity,$dateOfStart,$dateOfEnd){
    /*
    Okay guys lets do the analysis
    
    */
    $diff=date_diff($dateOfEnd,$dateOfStart);
    $val=($quantity/84)*($diff/84)*$estTime;
    return $val;
    /*
    for($k=0; $k<$diff; $k++){
        $val=($quantity/84)*($diff/84)*$estTime;
        
        if($diff==84){
            $val=($quantity/84)*(84/84)*$estTime;
        }
        else if($diff==63){
            $val=($quantity/84)*(63/84)*$estTime;
        }
        else if($diff==42){
            $val=($quantity/84)*(42/84)*$estTime;
        }
        else if($diff==21){
            $val=($quantity/84)*(21/84)*$estTime;
        }
    }*/
}

$activityCalendar=array(); //SCHEDULE ARRAY
$calendarHours=array();
$conn=mysqli_connect('localhost','goalsnoh_hassle','vIo2PMIR4LM-[G6E+.','goalsnoh_hassledb');
$result=mysqli_query($conn,'SELECT * FROM schedule');
while($row=mysqli_fetch_row($result)){
    //$t=array('date'=>$row[2],'hours'=>$row[1],'activities'=>array());
    $t=array($row[2]=>$row[1]);
    $a=array($row[2]=>array());
    array_push($calendarHours,$t);
    array_push($activityCalendar,$a);
}
mysqli_free_result($result);





$ng=count($_SESSION['goals']);
$startDate=$_SESSION['startdate'];
$myfile = fopen("newfile2.txt", "w+") or die("Unable to open file!");

for($i=0; $i<$ng; $i++){
    //The Processing starts here
    //At first extract the tactics
    $curtactics=$_SESSION['tactics'][$i];
    $nt=count($curtactics);
    fwrite($myfile,$nt);
    //
    $weekinfo=$_SESSION['weekinfo'][$i];
    $weeksToComplete=$weekinfo['weeksToComplete'];
    $startWeek=$weekinfo['startWeek'];
    
    $wcq=((int)$weeksToComplete)*7;
    $dst=((int)$startWeek-1)*7;
    
    $dateOfStart=date('Y-m-d', strtotime($_SESSION['startdate']. ' + '.$dst.' days'));
    $dateOfEnd=date('Y-m-d', strtotime($dateOfStart. ' + '.$wcq.' days'));
    
    
    for($j=0;$j<$nt;$j++){
        $activity=$curtactics[$j]['tactics'];
        fwrite($myfile,$activity);
        $estTime=$curtactics[$j]['est_time'];
        $quantity=$curtactics[$j]['quantity'];
        $frequency=$curtactics[$j]['frequency'];
        //Below is the INTENSITY variable. This variable multiplies the estimated time to the quantity
        $INTENSITY=generateIntensity($estTime,$quantity,$dateOfStart,$dateOfEnd);
        placeInCalendar($activity,$estTime,$quantity,$INTENSITY,$dateOfStart,$dateOfEnd,$activityCalendar,$calendarHours);
        
        /*
        for($k=0;$k<$wcq;$k++){
            $weekCounter++;
            $dateNow=date('Y-m-d', strtotime($_SESSION['startdate']. ' + '.$k.' days'));            
        }*/
    }
    
}
fclose($myfile);
$created=date('Y-m-d H:i:s');
mysqli_query($conn,'TRUNCATE TABLE events');
for($i=0;$i<count($activityCalendar); $i++){
    $dateNow=date('Y-m-d', strtotime($dateOfStart. ' + '.$i.' days'));
    mysqli_query($conn,"INSERT INTO events (title,date,created,modified,status) VALUES ('".$activityCalendar[$dateNow]."','".$dateNow."','".$created."','".$created."','0')");
}
mysqli_close($conn);
?>