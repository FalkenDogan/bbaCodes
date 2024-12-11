<?php
// db-connection
include '../../db-con.php';

// Güncelleme işlemi
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    foreach ($_POST['id'] as $key => $id) {
        $price = $_POST['price'][$key];

        $sql = "UPDATE kunden02 SET price = :price WHERE id = :id";
        $stmt = $conn->prepare($sql);      
   if ($stmt->execute([':price' => $price, ':id' => $id])) {
        echo "<div class='alert alert-success' id='alert'>Data wird aktualisiert!</div>";
    } else {
        echo "<div class='alert alert-danger' id='alert'>Data konnte nicht aktualisiert werden!</div>";
    }
    }     
}
?>
<script>
    setTimeout(function() {
        var alert = document.getElementById('alert');
        if (alert) {
            alert.style.display = 'none';
        }
    }, 3000); // 3 seconds
</script>
<?php

// Verileri çek
$sql = "SELECT * FROM kunden02";
$result = $conn->query($sql);
if (!$result) {
    echo "<div class='alert alert-danger'>Veritabanından veri alınamadı!</div>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kunden Panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="../../index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="KundenMainPage.php">Kunden Main Page</a>
            </li>
        </ul>
    </div>
</nav>
<h1>KUNDEN 02 ADMIN PANEL</h1>
<form method="POST">
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Produkt Number</th>
                <th>Produkt Name</th>
                <th>Preis</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>
                    <th scope="row"><?php echo $row['id']; ?></th>
                    <td><?php echo $row['product_number']; ?></td>
                    <td><?php echo $row['product_name']; ?></td>
                    <td>
                        <input type="text" name="price[]" value="<?php echo $row['price']; ?>">
                        <input type="hidden" name="id[]" value="<?php echo $row['id']; ?>">
                    </td>
                    <td><button type="submit" class="btn btn-primary">Update</button></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</form>
</body>
</html>