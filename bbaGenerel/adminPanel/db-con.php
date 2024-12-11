
<?php
// connection.php
try {
    $conn = new PDO("mysql:host=localhost;dbname=kunden", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo 'Es ist ein Datenbankfehler aufgetreten, der Admin ist bereits informiert<br>';
    echo $e->getMessage();
    // Mail an admin...
    exit; // Skript beenden
}
?>

