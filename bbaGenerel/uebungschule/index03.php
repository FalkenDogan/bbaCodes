<?php

//uebungsschule.test?a=5&b=7
// if(isset($_GET['a'])){
//     echo 'GET-DATEN'.$_GET['a'];
//     echo $_GET['b'];
// } else {
//     echo 'keine GET-DATEN';
// }

// Einbindung der Datenbank
include('db-con.php');

$postAusgabe = '';

if(isset($_POST['meintext'])){
    $postAusgabe = $_POST['meintext'];
}

// Abfrage aller Schueler aus der Datenbank
$stm = $conn->prepare("SELECT *         
                       FROM schueler
                       JOIN orte
                       ON orte.id = schueler.idOrte
                       ORDER BY schueler.name ASC"); // ASC ist default --> hier nicht

// um das Array anhand der Spaltennamen abzurufen anstelle der Indexe
// $stm = $conn->prepare("SELECT s.*, o.name as ort          
//                        FROM schueler s
//                        JOIN orte o
//                        ON o.id = s.idOrte
//                        ORDER BY schueler.name ASC");

$stm->execute([]); // neue schreibweise -> alt: execute(array());
$schueler = $stm->fetchAll(); //PDOStatement::fetchAll — Ruft die verbleibenden Zeilen aus einer Ergebnismenge ab
// $schueler = $stm->fetchAll(PDO::FETCH_NUM);   // zeigt nur die Indexe an
// $schueler = $stm->fetchAll(PDO::FETCH_ASSOC); // zeigt nur die Attribute an

// if(isset($_POST['submit']) && !empty(str_replace(' ', '',$_POST['ortseingabe']))){



//     $stm = $conn->prepare("SELECT s.*, o.name as ort         // Eingrenzen der Ergebnisse innerhalb der mySQL-Abfrage anstatt in der for- oder foreach-Schleife
//                                         FROM schueler s
//                                         JOIN orte o
//                                         ON o.id = s.idOrte
//                                         WHERE o.name = ?");  // ? als vordefinierter Platzhalter für meintext, um SQL-Injections zu verhindern
//     $stm->execute([$_POST['meintext']]);
//     $schueler = $stm->fetchAll(PDO::FETCH_ASSOC);

// }




// array_multisort(array_column($schueler, 'name'), SORT_ASC, $schueler,); // für den Fall, dass wir nicht schon in der mySQL-Abfrage das Array alphabetisch sortieren wollen

// for($i=0; $i<count($schueler); $i++){    // Auflisten der Vornamen aller Schüler mit einer for-Schleife
// echo $schueler[$i]['name'].'<br>' ;}

// foreach($schueler as $s){      // echo $s['name'].'<br>'; // Auflisten der Vornamen aller Schüler mit einer foreach-Schleife
    
//     // if (stripos($s['name'], 'G', $offset = 0) === 0)

//     if($s[1][0]=='G')
//     {
//         echo "<font size=6 color=#00FF00>".'<p>'.$s[1]." (".strlen($s[1]).") (".$s[9].", ".$s[10].")".'</p>'."</font>";          
//     } else {
//         echo '<p>'.$s[1]." (".strlen($s[1]).") (".$s[9].", ".$s[10].")".'</p>';   
//     }

//     // echo $s[1][0]=='G' ? "<font size=6 color='green'>".$s[1].'<br>'."</font>" : $s[1].'<br>'; // ternärer Operator
// }




// echo '<pre>';
// print_r($schueler);
// echo '</pre>';


//echo count($schueler);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <p>Anzahl Schüler: <?php echo count($schueler); ?> </p>

    <p><b>meine Formulareingabe:</b>
    <?php echo $postAusgabe; ?></p>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="text" name="meintext" placeholder="Eingabe">
        <input type="submit" name="submit" value="Los">
    </form>

    <?php 
        $counter = 0;
        
        if(isset($_POST['meintext'])){
            $postAusgabe = $_POST['meintext'];

        for($i=0; $i<count($schueler); $i++){          // damit das Ergebnis des Counters über 
            
                if($schueler[$i][10]==$postAusgabe){
                    
                    $counter++;
                }            
            }    

        echo '<p>'.'Davon '.$counter.' aus '.$postAusgabe.':'.'</p>';
        
        for($i=0; $i<count($schueler); $i++){
            
            if($schueler[$i][10]==$postAusgabe){
                echo '<p>'.$schueler[$i][1].'</p>';
            }            
        }
        
    }
    ?>
    
</body>
</html>