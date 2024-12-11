<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schul Übung</title>
</head>
<body>
   
   <?php
    // Veritabanı bağlantı dosyasını dahil et
    include ('db-con.php');
    // Veritabanı sorgusu
    $quaryStr01="SELECT * FROM schueler ORDER BY name ASC"; 
    
    $quaryStr02="SELECT schueler.name, orte.name FROM schueler JOIN orte ON schueler.id = orte.id;"; 

    $stm = $conn->prepare($quaryStr01);
    // Sorguyu çalıştır
    $stm->execute([]);
    $schuler = $stm->fetchAll(PDO::FETCH_ASSOC);
    //liste halinde yazıyor
    /*
    echo $schuler[0]['id'];
    echo "<pre>";
   print_r($schuler);
    echo "</pre>";
    //die();
*/
    /*
    for($i=0;$i<count($schuler);$i++){
    echo $schuler[$i]['name'].' ('. strlen($schuler[$i]['name']).')'."<br>";

    }
    */
    // arraydeki stringleri alfabetik sıraya koyar
   // array_multisort(array_column($schuler, 'name'), SORT_ASC, $schuler);



    ?>    
    <p>Anzahl Schuler: <?php echo count($schuler); ?></p>
    





</body>
</html>