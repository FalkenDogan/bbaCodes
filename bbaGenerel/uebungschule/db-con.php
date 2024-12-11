
<?php 
//try cath : Fehlerbehandlung
try {
    $conn = new PDO("mysql:host=localhost;dbname=uebungschule", "root", "");

} catch (Exception $e) {
    echo 'Es ist ein Datenbankfehler aufgetreten, der Admin ist bereits informiert<br>';
    echo $e -> getMessage();
    //Mail an admin...
    
}
?>
