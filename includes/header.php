<?php 

selectSiteData();

if ($rowSiteData['season']==0) $season="summer";
else if ($rowSiteData['season']==1) $season="winter";

$siteName=$rowSiteData['serverName'];

// Put bellow your head's meta, links, etc. 
?>
<head>
	
	<link rel="icon" type="image/png" href="https://i.imgur.com/x7P7fS7.png">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo url(); ?>/resources/css/normalize.css">
	<link rel="stylesheet" href="<?php echo url(); ?>/resources/css/main.css">
	<link rel="stylesheet" href="<?php echo url(); ?>/resources/css/<?php echo "$season" ?>.css">
	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="<?php echo url(); ?>/resources/js/vendor/modernizr-2.6.2.min.js"></script>
	
	<title><?=$siteName?> ! &raquo;</title>
</head>