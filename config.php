<?php
	############## MAIN ##############
	#Uncomment it to let show warnings and errors
	#error_reporting( E_ALL );
	#ini_set('display_errors', 1);

	############## DATABASE CONNETCION ##############
	$server = "localhost"; //ip
	$user = "user"; //username
	$pass = ""; //password
	$db = "mices"; //db
	$conn = new mysqli($server, $user, $pass, $db) or die('Could not connect: ' . mysql_error());
	$conn->query("SET NAMES utf8");

	############## SETTINGS ##############
	#Getting current date to some functions like post publishing
	$now=date("d/m/y");
	#Google Adsense settings. Uncomment to get working
	#$pub="ca-pub-5743321198705602"
	#$adid="5249212434"

	############## INCLUDES ##############
	include $_SERVER['DOCUMENT_ROOT'].'/modules/basic.php';
	include $_SERVER['DOCUMENT_ROOT'].'/modules/langues.php';
	include $_SERVER['DOCUMENT_ROOT'].'/modules/functions.php';
	include $_SERVER['DOCUMENT_ROOT'].'/modules/logout.php';
