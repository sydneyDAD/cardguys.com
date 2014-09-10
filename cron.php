<?php
/*
	Remove // from line $epc->write_saves=1;
	to have creditcard updates also
*/
if(isset($_SERVER['HTTP_HOST'])) die("Unauthorised Access");
define('TIMER',15);
//define('TIMER',0);
$oldtime=file_get_contents('timer.txt');
$timer=floor((time()-$oldtime)/60);
if($timer>=TIMER){
file_put_contents('timer.txt',time());
include_once "class/class_xmlfeed.php";
include_once "config.php";
$epc=new xmlfeed;
$epc->feed=1;
$epc->write_saves=1;
	$epc->loadxml();
}else{
	die("Cron Access Error");
}

?>