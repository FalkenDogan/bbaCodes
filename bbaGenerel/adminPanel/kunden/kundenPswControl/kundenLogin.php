<?php
include("einstellung.php");
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

        if ($username == "user1") {
            $redirectUrl = "../kunden/Kunden01/KundenMainPage.php";
        } elseif ($username == "user2") {
            $redirectUrl = "../kunden/Kunden02/KundenMainPage.php";
        } elseif ($username == "user3") {
            $redirectUrl = "../kunden/Kunden03/KundenMainPage.php";
        }
        break;
    }
}

if ($redirectUrl == "../index.php") {
    echo "Benutzername oder Passwort falsch.<br>";
    echo "Sie werden zur Anmeldeseite weitergeleitet.";
    header("Refresh: 2; url=../index.php");
} else {
    header("Location: $redirectUrl");
}

ob_end_flush();
?>