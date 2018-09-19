<?php include_once('generateFunction.php'); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Your Event Calendar</title>
<link type="text/css" rel="stylesheet" href="set_calendar/style.css"/>
<script src="set_calendar/jquery.min.js"></script>
</head>
<body>

<div id="calendar_div">
	<?php echo getCalender(); ?>
</div>

</body>
</html>
