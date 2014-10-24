<?php
	//Multicraft API Settings
	require('MulticraftAPI.php');
	$api = new MulticraftAPI('http://jocce.nu/multicraft/api.php', 'jocce', '672dfe87834abb8408e0');
	
	//ServerID here
	$serverid = 10;
	
	//how many rows to show
	$rows = 50;	
	
	//dont touch
	$servercheck = $api->getServerStatus($serverid, true);
	$serverstatus = $api->getServerStatus($serverid, true)[data];
	$sista = sizeof($api->getServerLog($serverid)[data]);	
	//print_r($serverstatus[status]);


	//checks if server is started - Starts if offline otherwise nothing
	if ($serverstatus[status] == online) {
	
	print ("Server is already Online");
	
	}	else {
	
	$api->startServer($serverid);
	print ("You have started the server!");
	
	}
	
	?>	
