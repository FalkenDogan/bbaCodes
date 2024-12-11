
<?php
// $user = "admin";
// $pass = "123456";
?>

<?php
/*$users = [
    ["user" => "user1", "pass" => "user1"],
    ["user" => "user2", "pass" => "user2"],
    ["user" => "user3", "pass" => "user3"]
];*/

// Veritabanı bağlantısını dahil et
include '../../db-con.php';

// user_control tablosundaki verileri çek
try {
    $stmt = $conn->query("SELECT user_name, user_password FROM user_control");
    $users = [];
    
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $users[] = [
            "user" => $row['user_name'],
            "pass" => $row['user_password']
        ];
    }

    // $users dizisini kontrol et (debugging için ekrana yazdır)
    echo '<pre>';
    print_r($users);
    echo '</pre>';
    
} catch (Exception $e) {
    echo 'Fehler beim Abrufen der Benutzerdaten: ' . $e->getMessage();
}
?>
