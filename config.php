<?php
	############## MAIN ##############
	#Uncomment it to let show warnings and errors
	#error_reporting( E_ALL );
	#ini_set('display_errors', 1);
	
	session_start();

	############## DATABASE CONNETCION ##############
	$conn = new mysqli(
		'localhost', //host
		'muir', //user
		'F~e8EbifPb@x', //pass
		'mices') //db
	or die ('[MYSQL] Connection error!');
	$conn->query("SET NAMES utf8");

	############## MULTILANGUE SUPPORT ##############
  $available_langs = array('en','ru');
  if(isset($_GET['lang']) && $_GET['lang'] != ''){ 
	if(in_array($_GET['lang'], $available_langs)){     
 		$_SESSION['lang'] = $_GET['lang'];   
    } else
    	$_SESSION['lang'] = 'en';
  }
  include $_SERVER['DOCUMENT_ROOT'].'/resources/lang/'.$_SESSION['lang'].'/lang.'.$_SESSION['lang'].'.php';

	############## SETTINGS ##############
	#Main link to the site
	$siteLink = "https://".$_SERVER['SERVER_NAME']; 
	#Getting current date to some functions like post publishing
	$now=date("d/m/y");
	#Google Adsense settings
	#$pub="ca-pub-5743321198705602"
	#$adid="5249212434"

	############## INCLUDES ##############
	include $_SERVER['DOCUMENT_ROOT'].'/resources/errors/codes.php'; //file with error codes to display
	include $_SERVER['DOCUMENT_ROOT'].'/modules/base.php'; //file that includes others modules

	############## FUNCTIONS ##############
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