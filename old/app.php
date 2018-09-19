<?php
  session_start();
  
  if(!isset($_SESSION['LOGIN_STATUS'])){
      header('location:login');
  }
?>
<!DOCTYPE html>
<html lang="en" >

<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Goal calendar generator</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="css/appstyle.css">
<link rel="stylesheet" href="css/modalcss.css">
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="bootstrap/css/font-awesome.css" rel="stylesheet">
<script src="js/jquery-3.3.1.min.js"></script>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="css/calendar.css" rel="stylesheet" type="text/css">

</head>

<body>
    
    <form action="#" class="regform" method="post">
    
        <fieldset id="define-goals">
            <div id="sf1" class="frm">
                <h1>Set your goals (must be measurable)</h1>       
                <label for="goal1">Goal no 1:</label>
                <input type="text" id="goal1" name="goal1">
                
                <label for="goal2">Goal no 2:</label>
                <input type="text" id="goal2" name="goal2">
                    
                <label for="goal3">Goal no 3:</label>
                <input type="text" id="goal3" name="goal3">
                
                <label for="goal4">Goal no 4:</label>
                <input type="text" id="goal4" name="goal4">
    
                <label for="goal5">Goal no 5:</label>
                <input type="text" id="goal5" name="goal5">
                <button class="btn btn-primary open1" type="button">Next <span class="fa fa-arrow-right"></span></button>
            </div>
            
        </fieldset>
        <fieldset id="set-tactics">
            <div id="sf2" class="frm" style="display:none;">
                <h1 id="tac-tile"></h1>
    			<p class="goal-name" id="tac-goal-name" align="center"></p>
    			<h2 align="center">Break your goal into actionable tactics (steps)<br>For examples <a href="">Click here</a></h2>
                <table id="set-tactics-table" align="center">
                    <tbody>
                    <tr id="tacheader">
                        <th></th>
                        <th>Tactics Name</th>
                        <th>Estimated time to complete (in minutes)</th>
                        <th>How many times in total do you need this tactic? <a href="#" id="myBtn">Click here</a> for reference table</th>
                        <th>Frequency(How often do you need this tactic?)</th>
                    </tr>
                    <tr id="row1">
                        <td>1</td>
                        <td><input type="text" id="name1" name="tacticsName[]" placeholder="Enter value"></td>
                        <td><input type="text" id="time1" name="estimatedTime[]" placeholder="Enter value"></td>
                        <td><input type="text" id="doTime1" name="howManyTimes[]" placeholder="Enter value"></td>
                        <td><input type="text" id="freq1" name="frequency[]" placeholder="Enter value"></td>
                    </tr>
                    </tbody>
                    
                </table>
                <button class="btn btn-secondary add_row" type="button">Add row <span class="fa fa-arrow-down"></span></button>
                <table id="tactics-init" align="center">
                    <tr>
                        <td>Weeks to complete</td>
                        <td><input type="text" id="weekstocomplete" placeholder="3, 6, 9 or 12"></td>
                        <td></td>
                        <td></td>
                        <td>Starting week</td>
                        <td><input type="text" id="startweek" placeholder="1-12"></td></td>
                    </tr>
                </table>
                
                <button class="btn btn-warning back2" type="button"><span class="fa fa-arrow-left"></span> Back</button> 
                <button class="btn btn-primary open2" type="button">Next <span class="fa fa-arrow-right"></span></button>
            </div>
        </fieldset>
        <fieldset id="schedule">
            <div id="sf3" class="frm" style="display:none;">
                <div class="tactics-row">
                    <div class="s-tactics-column" >
                        <label align="left" style="padding-top: 15px">Start date of your 12 week program</label>			
                    </div>
                        <div class="s-tactics-column" >
                        <input type="date" id="start-date">
                    </div>
                    <div style="padding: 10px 15px 20px">
                        Your availability, in hours, on each day of the week (can edit specific days later)
                    </div>
                        <div class="s-tactics-column" >
                        <label align="left" style="padding-top: 15px">Monday</label>			
                    </div>
                        <div class="s-tactics-column" >
                        <input type="text" align="right" id="monday">
                    </div>
                        <div class="s-tactics-column" >
                        <label align="left" style="padding-top: 15px">Tuesday</label>			
                    </div>
                        <div class="s-tactics-column" >
                        <input type="text" id="tuesday">
                    </div>
                        <div class="s-tactics-column" >
                        <label align="left" style="padding-top: 15px">Wednesday</label>			
                    </div>
                        <div class="s-tactics-column" >
                        <input type="text" id="wednesday">
                    </div>
                        <div class="s-tactics-column" >
                        <label align="left" style="padding-top: 15px">Thursday</label>			
                    </div>
                        <div class="s-tactics-column" >
                        <input type="text" id="thursday">
                    </div>
                        <div class="s-tactics-column" >
                        <label align="left" style="padding-top: 15px">Friday</label>			
                    </div>
                        <div class="s-tactics-column" >
                        <input type="text" id="friday">
                    </div>
                        <div class="s-tactics-column" >
                        <label align="left" style="padding-top: 15px">Saturday</label>			
                    </div>
                        <div class="s-tactics-column" >
                        <input type="text" id="saturday">
                    </div>		        		        		
                </div>
                <button class="btn btn-warning back3" type="button"><span class="fa fa-arrow-left"></span> Back</button> 
                <button class="btn btn-primary open3" type="button">Next <span class="fa fa-arrow-right"></span></button>
            </div>
        </fieldset>
        <fieldset id="schedule-calendar">
            <div id="sf4" class="frm" style="display:none;">
                <?php
                include_once 'functions.php';
                echo '<div id="calendar_div">';
	            echo getCalender();
                echo '</div>';
                ?>
                <button class="btn btn-warning back4" type="button"><span class="fa fa-arrow-left"></span> Back</button> 
                <button class="btn btn-primary open4" type="button">Next <span class="fa fa-arrow-right"></span></button>
            </div>
        </fieldset>
        <fieldset id="generate-page">
            <div id="sf5" class="frm" style="display:none;">
                <div>
                    <h1>Schedule</h1>
                    <h4 align="center">Let's generate your goal calendar!</h4>
                </div>
                <div >
                    <div class="s-tactics-column">
                        <label id="slno" style="padding-top: 15px">Add buffer (in hours)</label>
                    </div>
                    <div class="s-tactics-column" >
                        <input type="text">
                    </div>
                </div>        
                
                <div align="center">
                    <button class="btn btn-primary open5" type="button">Generate <span class="fa fa-arrow-right"></span></button>
                    
                </div>
            </div>
        </fieldset>
    </form>
    <div id="myModal" class="modal">

		<!-- Modal content -->
		<div class="modal-content">
		<span class="close">&times;</span>
		<h1 align="center">Reference table</h1>
			<table>
				<tr>
					<th>
						<span>Frequency</span>
					</th>
					<th>
					<span>How many times in total in 12 weeks</span>
					</th>
				</tr>
				<tr>
					<td>Every day</td>
					<td>84</td>
				</tr>
				<tr>
					<td>Twice a day</td>
					<td>168</td>
				</tr>
				<tr>
					<td>3 times a day</td>
					<td>252</td>
				</tr>
				<tr>
					<td>Once a week</td>
					<td>12</td>
				</tr>
				<tr>
					<td>Twice a week</td>
					<td>24</td>
				</tr>
				<tr>
					<td>3 times a week</td>
					<td>36</td>
				</tr>
				<tr>
					<td>4 times a week</td>
					<td>48</td>
				</tr>
				<tr>
					<td>5 times a week</td>
					<td>60</td>
				</tr>
				<tr>
					<td>6 times a week</td>
					<td>72</td>
				</tr>
			</table>
		</div>
	
	</div>
    <script type="text/javascript" src="jquery.validate.js"></script>
    
        <script type="text/javascript">
        var modal = document.getElementById('myModal');
        var span = document.getElementsByClassName("close")[0];
        jQuery().ready(function() {
            $(".add_row").click(function(){
                var rowCount = $('#set-tactics-table tr').length-1;
                $("#set-tactics-table > tbody:last-child").append(
                        '<tr>'
                        +'<td>'+String(rowCount+1)+'</td>'
                        +'<td><input type="text" id="name1" name="tacticsName[]" placeholder="Enter value"></td>'
                        +'<td><input type="text" id="time1" name="estimatedTime[]" placeholder="Enter value"></td>'
                        +'<td><input type="text" id="doTime1" name="howManyTimes[]" placeholder="Enter value"></td>'
                        +'<td><input type="text" id="freq1" name="frequency[]" placeholder="Enter value"></td>'
                        +'</tr>');
                
            });
            $(".open1").click(function() {
                $.ajax({
                    type:"POST",
                    url:"core/setgoal.php",
                    data:{'goal1':$('#goal1').val(),'goal2':$('#goal2').val(),'goal3':$('#goal3').val(),'goal4':$('#goal4').val(),'goal5':$('#goal5').val()},
                    dataType:'json',
                    success: function(result){
                        var $result=result.response;
                        var $goalText=result.goal;
                        var $curgoal=result.curgoal;
                        if($result=='go_on'){
                            $("#tac-tile").text("Tactics for goal "+$curgoal);
                            $("#tac-goal-name").text("Goal name: "+$goalText);
                            
                            $(".frm").hide("fast");
                            $("#sf2").show("slow");
                        }
                    }
                });
                
            });

            $(".open2").click(function() {
                var rowCount=$('#set-tactics-table tr').length;
                var tacticsData=[];
                var i;
                var table = document.getElementById('set-tactics-table');
                var weeksToComplete=$('#weekstocomplete').val();
                var startWeek=$('#startweek').val();
                for(i=0;i<rowCount; i++){
                    row=table.rows[i];
                    tactics_name=row[1];
                    est_time=row[2];
                    quantity=row[3];
                    frequency=row[4];
                    dat={'tactics':tactics_name,'est_time':est_time,'quantity':quantity,'frequency':frequency};
                    tacticsData.push(dat);
                }
                $.ajax({
                    type:"POST",
                    url:"core/settactics.php",
                    data:{'data':tacticsData,'weeksToComplete':weeksToComplete,'startWeek':startWeek},
                    dataType:'json',
                    success: function(result){
                        var $result=result.response;
                        var $goalText=result.goal;
                        var $curgoal=result.curgoal;
                        if($result=='incomplete'){
                            $("#set-tactics-table tr").remove();
                            $("#set-tactics-table > tbody:last-child").append(
                                '<tr id="tacheader">'
                                    +'<th></th>'
                                    +'<th>Tactics Name</th>'
                                    +'<th>Estimated time to complete (in minutes)</th>'
                                    +'<th>How many times in total do you need this tactic? <a href="#" id="myBtn">Click here</a> for reference table</th>'
                                    +'<th>Frequency(How often do you need this tactic?)</th>'
                                +'</tr>'
                                +'<tr id="row1">'
                                    +'<td>1</td>'
                                    +'<td><input type="text" id="name1" name="tacticsName[]" placeholder="Enter value"></td>'
                                    +'<td><input type="text" id="time1" name="estimatedTime[]" placeholder="Enter value"></td>'
                                    +'<td><input type="text" id="doTime1" name="howManyTimes[]" placeholder="Enter value"></td>'
                                    +'<td><input type="text" id="freq1" name="frequency[]" placeholder="Enter value"></td>'
                                +'</tr>');
                            $("#tac-tile").text("Tactics for goal "+$curgoal);
                            $("#tac-goal-name").text("Goal name: "+$goalText);
                            $("#weekstocomplete").val("");
                            $("#startweek").val("");
                        }
                        
                        else if($result=='complete'){
                            $(".frm").hide("fast");
                            $("#sf3").show("slow");
                        }
                    }
                });
            });
            $(".open3").click(function(){
                dt = new Date($('#start-date').val());
                
                date=dt.getFullYear()+'-'+dt.getMonth()+'-'+dt.getDate();
                //date=dt;
                
               $.ajax({
                  type:"POST",
                  url:"core/setschedule.php",
                  data:{'startdate':date,'monday':$('#monday').val(),'tuesday':$('#tuesday').val(),'wednesday':$('#wednesday').val(),'thursday':$('#thursday').val(),'friday':$('#friday').val(),'saturday':$('#saturday').val()},
                  dataType:'json',
                  success: function(result){
                      var $response=result.response;
                      var $scheduleArray=result.scheduleArray;
                      
                      if($response=='sc_complete'){
                          $(".frm").hide("fast");
                          $("#sf4").show("slow");
                      }
                  }
               }); 
            });
            $(".open4").click(function(){
                $(".frm").hide("fast");
                $("#sf5").show("slow");
            });
            $(".open5").click(function(){
                $.ajax({
                  type:"POST",
                  url:"core/generateCalendar.php",
                  
                  success: function(result){
                      location.href="http://nohasslegoals.com/goalCalendar";
                  }
               });
            });
            
            
            $(".back2").click(function() {
                $.ajax({
                    type:"POST",
                    url:"core/resetvar.php",
                    cache:false,
                    success: function(e){
                        $(".frm").hide("fast");
                        $("#sf1").show("slow");
                        }
                    
                });
               
            });

            $(".back3").click(function() {
                $(".frm").hide("fast");
                $("#sf2").show("slow");
            });
            $("#myBtn").click(function(){
                modal.style.display = "block";
            });
            $(".close").click(function(){
                modal.style.display = "none";
            });
        });
        function trim(str){
             var str=str.replace(/^\s+|\s+$/,'');
             return str;
        }
    </script>
</body>
</html>