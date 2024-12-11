<?php
include("adminEinstellung.php");
session_start();
ob_start();

$username = $_POST["username"];
$password = $_POST["password"];
$redirectUrl = "../index.php";

foreach ($users as $user) {
    if ($username == $user["user"] && $password == $user["pass"]) {
        $_SESSION["login"] = "true";
        $_SESSION["user"] = $username;
        $_SESSION["pass"] = $password;

        if ($username == "admin1") {
            $redirectUrl = "../../kunden/Kunden01/KundenPanel.php";
        } elseif ($username == "admin2") {
            $redirectUrl = "../../kunden/Kunden02/KundenPanel.php";
        } elseif ($username == "admin3") {
            $redirectUrl = "../../kunden/Kunden03/KundenPanel.php";
        }
        break;
    }
}

if ($redirectUrl == "../index.php") {
    echo "Benutzername oder Passwort falsch.<br>";
    echo "Sie werden zur Anmeldeseite weitergeleitet.";
    header("Refresh: 2; url=../../index.php");
} else {
    header("Location: $redirectUrl");
}

ob_end_flush();
?>