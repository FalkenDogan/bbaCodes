<?php 

    try {
        $conn = new PDO('mysql:host=localhost;dbname=neue20.08', 'root', '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage());
    }


?>