<?php

	############## MULTILANGUE SUPPORT ##############
  $available_langs = array('en','ru','uk','be','zh');
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