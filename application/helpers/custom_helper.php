<?php

function str_truncate($text,$to=false){

	return (strlen($text)>$to || !$to)? $text."...":$text;
}

function dd($text){

	print_r($text);
	exit();
}



?>