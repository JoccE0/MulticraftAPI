<?php
	//Multicraft API Settings
	require('MulticraftAPI.php');
	$api = new MulticraftAPI('http://jocce.nu/multicraft/api.php', 'jocce', '672dfe87834abb8408e0');
	
	//ServerID here
	$serverid = 9;
	
	//how many rows to show
	$rows = 50;	
	
	//dont touch
	$servercheck = $api->getServerStatus($serverid, true);
	$serverstatus = $api->getServerStatus($serverid, true)[data];
	$sista = sizeof($api->getServerLog($serverid)[data]);	
	//print_r($serverstatus[status]);
?>	

<html>
<head>
<title>Controll Panel ala JoccE</title>
<link type="text/css" rel="stylesheet" href="stylesheet.css"/>
</head>
<body>
<div id="header">
	<form method="post"  action="index.php" class="left">
	<input type="submit" value="Back" name="Back" /></form>
</div>
<div id="body">
	<?php
	//checks if server is started - Starts if offline otherwise nothing
	if ($serverstatus[status] == online) {
	
	print ("Server is already Online");
	
	}	else {
	
	$api->startServer($serverid);
	print ("You have started the server!");
	
	}
	
	?>	

</div>
<div id="footer">Restart Script made by JoccE</div>

</body>
</html>
