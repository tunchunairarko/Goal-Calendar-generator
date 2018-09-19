/*------------Validation Function-----------------*/
var count = 0; // To count blank fields.
function validation(event) {
    var radio_check = document.getElementsByName('gender'); // Fetching radio button by name.
    var input_field = document.getElementsByClassName('text_field'); // Fetching all inputs with same class name text_field and an html tag textarea.
    var text_area = document.getElementsByTagName('textarea');
// Validating radio button.
if (radio_check[0].checked == false && radio_check[1].checked == false) {
    var y = 0;
} else {
    var y = 1;
}
// For loop to count blank inputs.
for (var i = input_field.length; i > count; i--) {
    if (input_field[i - 1].value == '' || text_area.value == '') {
        count = count + 1;
    } 
    else {
        count = 0;
    }
}
if (count != 0 || y == 0) {
    alert("*All Fields are mandatory*"); // Notifying validation
    event.preventDefault();
} 
else {
    return true;
}
}
/*---------------------------------------------------------*/
// Function that executes on click of first next button.
var curgoal=0;
var goals=[];
var tactics=[];
var startDate=new Date();
var schedule={'Monday':0,'Tuesday':0,'Wednesday':0,'Thursday':0,'Friday':0,'Saturday':0};
var calendarEvents={'Monday':[],'Tuesday':[],'Wednesday':[],'Thursday':[],'Friday':[],'Saturday':[]};
function addGoal(g){
    if(g!=''){
        goals.push(g);
    }
}
function onGoalSet() {
    tempGoal=[];
    tempGoal.push(document.getElementById('goal1'));
    tempGoal.push(document.getElementById('goal2'));
    tempGoal.push(document.getElementById('goal3'));
    tempGoal.push(document.getElementById('goal4'));
    tempGoal.push(document.getElementById('goal5'));
    
    for(var i=1; i<=5; i++){
        addGoal(tempGoal[i]);
    }
    curgoal=curgoal+1;
    tgoal=goals[curgoal-1];
    document.getElementById("tac-tile").value='Tactics for goal '.concat(curgoal.toString());
    document.getElementById("tac-goal-name").value=document.getElementById(goal.concat(curgoal));
    
    document.getElementById("define-goals").style.display = "none";
    document.getElementById("set-tactics").style.display = "block";
    document.getElementById("schedule").style.display = "none";
    document.getElementById("schedule-calendar").style.display = "none";
    document.getElementById("generate-page").style.display = "none";
}
// Function that executes on click of first previous button.
function onGoingBackToGoals() {
    document.getElementById("define-goals").style.display = "block";
    document.getElementById("set-tactics").style.display = "none";
    document.getElementById("schedule").style.display = "none";
    document.getElementById("schedule-calendar").style.display = "none";
    document.getElementById("generate-page").style.display = "none";
}
// Function that executes on click of second next button.
function getTacticsData(name,time,hmt,freq){
    d={'name':name,'duration':time,'doTimes':hmt,'frequency':freq};
    return d;
}
function onSettingTactics() {
    if(curgoal-1==goals.length){
        tgoal=goals[curgoal-1];
        t=[];
        for(var i=0; i<$rowno; i++){
            name=document.getElementById("name1").value;
            time=document.getElementById("time1").value;
            doTime=document.getElementById("doTime1").value;
            freq=document.getElementById("freq1").value;
            d=getTacticsData(name,time,doTime,freq);
            t.push(d);
        }
        tactics.push(t)
        document.getElementById("define-goals").style.display = "none";
        document.getElementById("set-tactics").style.display = "none";
        document.getElementById("schedule").style.display = "block";
        document.getElementById("schedule-calendar").style.display = "none";
        document.getElementById("generate-page").style.display = "none";
    }
    else{
        $rowno=$("#set-tactics-table tr").length-1;
        tgoal=goals[curgoal-1];
        t=[];
        for(var i=0; i<$rowno; i++){
            name=document.getElementById("name1").value;
            time=document.getElementById("time1").value;
            doTime=document.getElementById("doTime1").value;
            freq=document.getElementById("freq1").value;
            d=getTacticsData(name,time,doTime,freq);
            t.push(d);
        }
        tactics.push(t)
        updateDiv();
    }   
    
}

function getDatesFromWeekdays(weekday){
    
}

function updateDiv()
{ 
    $( "#set-tactics" ).load(window.location.href + " #set-tactics" );
}
// Function that executes on click of second previous button.
function onSettingSchedule() {
    startDate=new Date(document.getElementById("start-date").value);

    schedule['Monday']=document.getElementById("monday").value;
    schedule['Tuesday']=document.getElementById("tuesday").value;
    schedule['Wednesday']=document.getElementById("wednesday").value;
    schedule['Thursday']=document.getElementById("thursday").value;
    schedule['Friday']=document.getElementById("friday").value;
    schedule['Saturday']=document.getElementById("saturday").value;

    endDate=new Date(startDate.getDate()+84);
    var tmp={'1':schedule['Monday'],'2':schedule['Tuesday'],'3':schedule['Wednesday'],'4':schedule['Thursday'],'5':schedule['Friday'],'6':schedule['Saturday']};
    var dates=[];

    var endDate = endDate.toISOString().substr(0,10);
    $.getScript('moment.min.js', function()
    {
        let start=moment(startDate);
        let end=moment(endDate);
        for (var i=1; i<=7; i++){
            var arr=[];
            let tmp = start.clone().day(i);
            if( tmp.isAfter(start, 'd') ){
                arr.push(tmp.format('YYYY-MM-DD'));
            }
            while( tmp.isBefore(end) ){
                tmp.add(7, 'days');
                arr.push(tmp.format('YYYY-MM-DD'));
            }
            n=arr.length;
            for (var j=0; j<n; j++){
                du=tmp[i];
                dates.push({'Date':arr[j],'dur':du});
            }             
        }
        for(var j=0; j<dates.length; j++){
            calendarEvents.push({'id':j+1,'text':dates[j]['dur'],'start_date':dates[j]['Date'],'end_date':dates[j]['Date']});
        }
    });

}
function onGoingBackToTactics(){
    document.getElementById("third").style.display = "none";
    document.getElementById("second").style.display = "block";
}