
<?php

// Include the database connection
include '../../db-con.php';

// Fetch data from the user_control table
try {
    $stmt = $conn->query("SELECT admin_name, admin_password FROM admin_control");
    $users = [];
    
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $users[] = [
            "user" => $row['admin_name'],
            "pass" => $row['admin_password']
        ];
    }
  
} catch (Exception $e) {
    echo 'Fehler beim Abrufen der Benutzerdaten: ' . $e->getMessage();
}
?>
?>