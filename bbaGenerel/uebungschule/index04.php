<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schul Übung</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
   
   <?php
    // Veritabanı bağlantı dosyasını dahil et
    include ('db-con.php');
    // Veritabanı sorgusu
    
    $quaryStr02="SELECT nationalitaet as Land, COUNT(id) as 'Anzahl Schuler' from schueler GROUP by nationalitaet;;"; 

    $stm = $conn->prepare($quaryStr02);
    // Sorguyu çalıştır
    $stm->execute([]);
    $schulerOrt = $stm->fetchAll(PDO::FETCH_ASSOC);
  /*
    //liste halinde yazıyor
     echo $schulerOrt[0]['id'];
    echo "<pre>";
    print_r($schulerOrt);
    echo "</pre>";
    //die();
*/
    
   

    ?>    
<table>
    <tr>
        <td>LAND</td>
        <?php
        // Sırasıyla "Land" verilerini dolduruyoruz
        for($i=0; $i<count($schulerOrt); $i++){
            echo '<td>' . $schulerOrt[$i]['Land'] . '</td>';
        }
        ?>
    </tr>
    <tr>
        <td>ZAHL</td>
        <?php
        // Sırasıyla "Anzahl Schuler" verilerini dolduruyoruz
        for($i=0; $i<count($schulerOrt); $i++){
            echo '<td>' . $schulerOrt[$i]['Anzahl Schuler'] . '</td>';
        }
        ?>
    </tr>
</table>

</body>
</html>





</body>
</html>