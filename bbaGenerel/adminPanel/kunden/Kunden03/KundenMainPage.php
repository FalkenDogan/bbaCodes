<?php
// db-connection
include '../../db-con.php';

// make a query
$sql = "SELECT * FROM kunden03";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kunden Main Page</title>
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
    <a class="nav-link" href="../kundenSignIn.php" id="adminPanelLink">Admin Panel</a>
</li>

    </ul>   

  </div>
  </nav>
<h1>KUNDEN 03</h1>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Produkt Number</th>
            <th>Produkt Name</th>
            <th>Prise</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <th scope="row"><?php echo $row['id']; ?></th>
                <td><?php echo $row['product_number']; ?></td>
                <td><?php echo $row['product_name']; ?></td>
                <td><?php echo $row['price']; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>


<script>
    document.getElementById("adminPanelLink").addEventListener("click", function(event) {
        event.preventDefault(); // Verhindert die sofortige Navigation
        alert("Sie werden zur Anmeldeseite für die Verwaltungsberechtigung weitergeleitet"); // Zeigt den Alert
        setTimeout(function() {
            window.location.href = "../kundenSignIn.php"; // Weiterleitung nach 1 second
        }, 1000); 
    });
</script>

</body>
</html>
<?php $conn = null; ?>
