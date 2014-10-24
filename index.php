<html>
<head>
<title>Controll Panel ala JoccE</title>
<link type="text/css" rel="stylesheet" href="stylesheet.css"/>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>
<body>
<?php

	//Multicraft API Settings
	require('MulticraftAPI.php');
	$api = new MulticraftAPI('http://jocce.nu/multicraft/api.php', 'jocce', '672dfe87834abb8408e0');
	
	//ServerID here
	$serverid = 10;
	
	//how many rows to show (loading time gets less the less lines
	$rows = 40;	
	
	//dont touch. variables for stuff
	$servercheck = $api->getServerStatus($serverid, true);
	$serverstatus = $api->getServerStatus($serverid, true)[data];
	$sista = sizeof($api->getServerLog($serverid)[data]);	
	//print_r($serverstatus[status]);	
?>	
<div id="header">
	<button onclick="startServer()" class="right">Start Server</button>
	
	<button onclick="restartServer()" class="right">Restart Server</button>

	<a href="http://test.com/">
   	 <button class="right">Crash Logs</button>

	<a href="console.php">
   	 <button class="right">Longer Console</button>
	</a>
</div>

<div id="body">


<script>
function restartServer() {
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("demo").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","restart.php",true);
xmlhttp.send();
}

function startServer() {
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("demo").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","start.php",true);
xmlhttp.send();
}
</script>


<p id="demo"></p>

	<h2>Console:</h2> <br />
	<div id="console">
	<?php
	for ($i = $sista; $i >= $sista-$rows; $i--) {
	
	print_r($api->getServerLog($serverid)[data][$i]['line']);
	print "<br/>";
	}
	?>
	</div>	


	
</div>
<center>
<div id="footer">-Restart Script made by JoccE-</div>
</center>
</body>
</html>
