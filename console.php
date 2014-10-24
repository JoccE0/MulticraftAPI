<?php	
	//Multicraft API Settings
	require('MulticraftAPI.php');
	$api = new MulticraftAPI('http://jocce.nu/multicraft/api.php', 'jocce', '672dfe87834abb8408e0');
	
	//ServerID here
	$serverid = 10;
	
	//how many rows to show (loading time gets less the less lines
	$rows = 100;	
	
	//dont touch. variables for stuff
	$servercheck = $api->getServerStatus($serverid, true);
	$serverstatus = $api->getServerStatus($serverid, true)[data];
	$sista = sizeof($api->getServerLog($serverid)[data]);		
?>
	<h2>Console:</h2> <br />
	<div id="console">
	<?php
	for ($i = $sista; $i >= $sista-$rows; $i--) {

	print_r($api->getServerLog($serverid)[data][$i]['line']);
	print "<br/>";
	}
	?>
	</div>
