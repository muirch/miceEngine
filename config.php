<?php
	############## MAIN ##############
	#Uncomment it to let show warnings and errors
	error_reporting( E_ALL );
	ini_set('display_errors', 1);
	
	session_start();

	############## DATABASE CONNETCION ##############
	$server = "localhost"; //ip
	$user = "muir"; //username
	$pass = "F~e8EbifPb@x"; //password
	$db = "mices"; //db
	$conn = new mysqli($server, $user, $pass, $db) or die('Could not connect: ' . mysql_error());
	$conn->query("SET NAMES utf8");

	############## MULTILANGUE SUPPORT ##############
  $available_langs = array('en','ru','uk');
  $curlang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
  if(isset($_GET['lang']) && $_GET['lang'] != ''){ 
		if(in_array($_GET['lang'], $available_langs)){     
	 		$_SESSION['lang'] = $_GET['lang'];   
	  } 
	} elseif(!isset($_GET['lang'])){
			if (in_array($curlang, $available_langs))
	    $_SESSION['lang'] = $curlang;
	}	else
	  	$_SESSION['lang'] = 'en';
  include $_SERVER['DOCUMENT_ROOT'].'/resources/lang/lang.'.$_SESSION['lang'].'.php';

	############## SETTINGS ##############
	#Getting current date to some functions like post publishing
	$now=date("d/m/y");
	#Google Adsense settings. Uncomment to get working
	#$pub="ca-pub-5743321198705602"
	#$adid="5249212434"

	############## INCLUDES ##############
	include $_SERVER['DOCUMENT_ROOT'].'/resources/errors/codes.php'; //file with error codes to display
	include $_SERVER['DOCUMENT_ROOT'].'/modules/base.php'; //file that includes others modules

	############## FUNCTIONS ##############
	#Main link to the site
	function url(){
	  return sprintf("%s://%s", isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http', $_SERVER['SERVER_NAME']);
	} 

	#Checks session and if user has no session named user or admin,
	#he will be redirected to login page
	function checkSession() { //
		if(!isset($_SESSION['user']) and !isset($_SESSION['admin']) ) {
			header("Location: $siteLink/usr/login");
			exit;
		}	
	};

	#Checks session and if user has no session named user,
	#he will be redirected to login page
	function checkUserSession() {
		if (empty(isset($_SESSION['user']))) {
			header("Location: $siteLink/usr/login");
			exit;
		}	
	};

	#Checks session and if user has no session named admin,
	#he will be redirected to login page
	function checkAdminSession() {
		if (empty(isset($_SESSION['admin']))) {
			header("Location: $siteLink/usr/login");
			exit;
		}		
	};

	#It selects all user's data
	function selectData() { 
	  global $conn;
		global $userRow;
    if ($_SESSION['user']){
        $res=$conn->query("SELECT * FROM users WHERE PlayerID=".$_SESSION['user']);
        $userRow=$res->fetch_array();
    } elseif ($_SESSION['admin']){
        $res=$conn->query("SELECT * FROM users WHERE PlayerID=".$_SESSION['admin']);
        $userRow=$res->fetch_array();
    }
	};

	#It selects all sites's data
	function selectSiteData() {
	  global $conn;
		global $rowSiteData;
    $res=$conn->query("SELECT * FROM site");
    $rowSiteData=$res->fetch_array();
	};