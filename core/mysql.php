<?php
function mysql_safe_string($value) {
	$value = trim($value);
	if(empty($value))			return 'NULL';
	elseif(is_numeric($value))	return $value;
	else						return "'".mysqli_real_escape_string($value)."'";
}

function mysql_safe_query($query) {
	$args = array_slice(func_get_args(),1);
	$args = array_map('mysqli_safe_string',$args);
	return mysqli_query(vsprintf($query,$args));
}

function redirect($uri) {
	header('location:'.$uri);
	exit;
}


// mysqli_connect('localhost','goalsnoh_hassle','vIo2PMIR4LM-[G6E+.');
mysqli_connect('localhost','root','');
mysqli_select_db('goalsnoh_hassledb');
