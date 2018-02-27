<?php

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