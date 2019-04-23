<?php
//print_r($_FILES); //this will print out the received name, temp name, type, size, etc.
$size = $_FILES['audio_data']['size']; //the size in bytes
$input = $_FILES['audio_data']['tmp_name']; //temporary name that PHP gave to the uploaded file
$output = $_FILES['audio_data']['name'].".wav"; //letting the client control the filename is a rather bad idea
$path = "C:/Users/jplaf/Desktop/";
//move the file from temp name to local folder using $output name



moveuploadedfile($input, function(){
	//echo $_SERVER['DOCUMENT_ROOT']."\n";
	//$cmd = $_SERVER['DOCUMENT_ROOT']."/Win32/SMILExtract_Release -C ".$_SERVER['DOCUMENT_ROOT']."/Win32/config/emobase.conf -I ".$_SERVER['DOCUMENT_ROOT']."/uploads/audio.wav -O ".$_SERVER['DOCUMENT_ROOT']."/output/output.arff 2>&1";
	putenv('PATH=' . $_SERVER['PATH']);
	$cmd = "C:/ProgramData/Anaconda3/python ".$_SERVER['DOCUMENT_ROOT']."/scripts/script.py ".$_SERVER['DOCUMENT_ROOT']."/uploads/audio.wav 2>&1";

	exec($cmd, $output, $return_var);
	//var_dump($output);
	//echo strpos($output, "$");
	//echo substr($output[$output.sizeof-1], strpos($output, "$"));
	$index = count($output)-1;

	echo $output[$index];
	//echo $output[$output.count-1];
});


function moveuploadedfile($input, $callback){
	$success = move_uploaded_file($input,  $_SERVER['DOCUMENT_ROOT']."/uploads/audio.wav");
	//echo  var_export($success, true);
	$callback();
}


?>
