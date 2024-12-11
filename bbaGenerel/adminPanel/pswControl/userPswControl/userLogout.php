<?php
session_start();
ob_start();
session_destroy();
echo "Sie haben sich abgemeldet. Sie werden zur Startseite weitergeleitet";
header("Refresh: 2; url=../index.php");
ob_end_flush();
?>