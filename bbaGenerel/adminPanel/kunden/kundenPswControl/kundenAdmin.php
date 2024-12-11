<?php
include("ayar.php");
session_start();
if(!isset($_SESSION["login"])){
echo "Sie haben keine Berechtigung, diese Seite anzusehen.";
}else{
echo "Willkommen auf der Admin-Seite..<br>";
echo "<a href=logout.php>Sign out</a>";
}
?>