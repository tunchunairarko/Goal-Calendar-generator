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
                <label>Name:</label>
                <input type="text" id="goal1" name="goal1">
                <label for="weeksToComplete">Weeks to complete:</label>
                <select name="weeksToComplete" id="weeksToComplete">
                    <option value="3">Three</option>
                    <option value="6">Six</option>
                    <option value="9">Nine</option>
                    <option value="12">Twelve</option>
                </select>
                <label for="startingWeek">Starting week:</label>
                <select name="startingWeek" id="startingWeek">
                    <option value="0">First</option>
                    <option value="3">Third</option>
                    <option value="6">Sixth</option>
                    <option value="9">Ninth</option>
                </select>
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
                        <th>Tactic frequency</th>
                    </tr>
                    <tr id="row1">
                        <td>1</td>
                        <td><input type="text" id="name1" name="tacticsName[]" placeholder="Enter value"></td>
                        <td><input type="text" id="time1" name="estimatedTime[]" placeholder="Enter value"></td>
                        <td>
                            <select id="doTime1" name="howManyTimes[]">
                                <option value="0">1 time</option>
                                <option value="1">2 times</option>
                                <option value="2">1/week</option>
                                <option value="3">2/week</option>
                                <option value="4">3/week</option>
                                <option value="5">4/week</option>
                                <option value="6">5/week</option>
                                <option value="7">6/week</option>
                                <option value="8">Everyday</option>
                                <option value="9">2 times/day</option>
                                <option value="10">3 times/day</option>
                            </select>
                        </td>
                    </tr>
                    </tbody>
                    
                </table>
                <button class="btn btn-secondary add_row" type="button">Add row <span class="fa fa-arrow-down"></span></button>
                <br>
                <button class="btn btn-warning back2" type="button"><span class="fa fa-arrow-left"></span> Back</button> 
                <button class="btn btn-primary open2" type="button">Next <span class="fa fa-arrow-right"></span></button>
            </div>
        </fieldset>
    </form>
    <script type="text/javascript" src="jquery.validate.js"></script>
    
        <script type="text/javascript">
        var modal = document.getElementById('myModal');
        var span = document.getElementsByClassName("close")[0];
        ///////////////////
        //all variables
        var goals=[];
        var curgoal='';
        var tacticsData=[];
        var weeksToComplete=12;
        var startingWeek=1;
        //////////////////
        jQuery().ready(function() {            
            $(".open1").click(function() {
                curgoal=$('#goal1').val();
                //check if curgoal is not pushed into already
                if(goals.includes(curgoal)==false){
                    goals.push(curgoal);
                }
                weeksToComplete=$("#weeksToComplete").val();
                startingWeek=$("#startingWeek").val();
                
                $("#tac-tile").text('Tactics for '+curgoal);
                $(".frm").hide("slow");
                $("#sf2").show("slow");
            });

            $(".open2").click(function() {
                var rowCount=$('#set-tactics-table tr').length;
                var table = document.getElementById('set-tactics-table');
                for(var i=0;i<rowCount; i++){
                    row=table.rows[i];
                    tactics_name=row[1];
                    est_time=row[2];
                    quantity=row[3];
                    frequency=row[4];
                    dat={'tactics':tactics_name,'est_time':est_time,'quantity':quantity,'frequency':frequency};
                    tacticsData.push(dat);
                }
                $(".frm").hide("slow");
                $("#sf3").show("slow");
            });
            $(".open3").click(function(){
               
            });
            $(".open4").click(function(){
                
            });
            $(".open5").click(function(){
               
            });
            
            
            $(".back2").click(function() {
                
            });

            $(".back3").click(function() {
                
            });

            $(".add_row").click(function(){
                var rowCount = $('#set-tactics-table tr').length-1;
                $("#set-tactics-table > tbody:last-child").append(
                        '<tr>'
                        +'<td>'+String(rowCount+1)+'</td>'
                        +'<td><input type="text" id="name1" name="tacticsName[]" placeholder="Enter value"></td>'
                        +'<td><input type="text" id="time1" name="estimatedTime[]" placeholder="Enter value"></td>'
                        +'<td>'
                            +'<select id="doTime1" name="howManyTimes[]">'
                                +'<option value="0">1 time</option>'
                                +'<option value="1">2 times</option>'
                                +'<option value="2">1/week</option>'
                                +'<option value="3">2/week</option>'
                                +'<option value="4">3/week</option>'
                                +'<option value="5">4/week</option>'
                                +'<option value="6">5/week</option>'
                                +'<option value="7">6/week</option>'
                                +'<option value="8">Everyday</option>'
                                +'<option value="9">2 times/day</option>'
                                +'<option value="10">3 times/day</option>'
                            +'</select>'
                        +'</td>'
                        +'</tr>');
                
            });


            $("#myBtn").click(function(){

            });
            $(".close").click(function(){

            });
        });
        function trim(str){
             var str=str.replace(/^\s+|\s+$/,'');
             return str;
        }
    </script>
</body>
</html>