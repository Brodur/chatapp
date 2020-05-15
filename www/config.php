<?php 
$dbhost = "localhost";
$dbname = "efiction";
$dbuser= "efiction";
$dbpass = "efiction";
$sitekey = "DmLT6vmiXt";
$settingsprefix = "settings";

include_once("includes/dbfunctions.php");
if(!empty($sitekey)) $dbconnect = dbconnect($dbhost, $dbuser,$dbpass, $dbname);

?>