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
    
    $quaryStr02="SELECT schueler.name as SchuelerName, orte.name as OrteName FROM schueler JOIN orte ON schueler.idOrte = orte.id;"; 

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
    
    for($i=0;$i<count($schulerOrt);$i++){
    echo $schulerOrt[$i]['SchuelerName'].' - '.$schulerOrt[$i]['OrteName']."<br>";
    }
    
    ?>    

    





</body>
</html>