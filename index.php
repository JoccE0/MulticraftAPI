<html>
<head>
<title>Controll Panel ala JoccE</title>
<link type="text/css" rel="stylesheet" href="stylesheet.css"/>
</head>
<body>
<?php
	
	//Multicraft API Settings
	require('MulticraftAPI.php');
	$api = new MulticraftAPI('http://jocce.nu/multicraft/api.php', 'jocce', '672dfe87834abb8408e0');
	
	//ServerID here
	$serverid = 9;
	
	//how many rows to show
	$rows = 50;	
	
	//dont touch. variables for stuff
	$servercheck = $api->getServerStatus($serverid, true);
	$serverstatus = $api->getServerStatus($serverid, true)[data];
	$sista = sizeof($api->getServerLog($serverid)[data]);	
	//print_r($serverstatus[status]);	
?>	
<div id="header">
	<form method="post"  action="start.php" class="left">
	<input type="submit" value="Start Server" name="Start Server" /></form>
	
	<form method="post"  action="restart.php" class="right">
	<input type="submit" value="Restart Server" name="Restart Server" /></form>
	
	<a href="http://crash.ftbees.com/" class="right">
    <button>Crash Logs</button>
	</a>
</div>


<div id="body">
	<h2>Console:</h2>
	<div id="console">
	<?php
	for ($i = $sista; $i >= $sista-$rows; $i--) {
	
	print_r($api->getServerLog(9)[data][$i]['line']);
	print "<br/>";
	}
	?>
	</div>		
</div>
<div id="footer">Restart Script made by JoccE</div>

</body>
</html>
