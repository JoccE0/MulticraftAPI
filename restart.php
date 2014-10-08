<?php
	//Multicraft API Settings
	require('MulticraftAPI.php');
	$api = new MulticraftAPI('http://example.com/api.php', 'YOURUSER', 'YOURAPICODE');
	
	//ServerID here
	$serverid = 9;
	
	//Seconds between restart
	$restarttime = 5;
	
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
	sleep($restarttime);
	$api->restartServer($serverid);
	print ("Server is restarting in!");
	?>	
</div>

<div id="footer">Restart Script made by JoccE</div>

</body>
</html>
