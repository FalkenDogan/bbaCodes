<?php 
//Eingabe, z.B. aus Formular (Länge 48Zeichen aus 0 und/oder 1)
//$bit = '001101010111101100010010000000000000000000000001';
if (isset($_POST['submit'])) {
    $bit = str_replace(" ", "", $_POST['eingabe']);

// Variablen für die Weiterarbeit im Programm
$separator = '-';
$binTemp1 = '';
$binTemp2 = '';
$kanAusgabe = '';
$temp = '';


//gesamte Eingabe ($bit) durch eine Schleife laufen lassen
for($i=0;$i<48;$i++){
      
    // Prüfen, wann Oktett je Schleifendurchlauf befüllt ist:
    if($i > 0 && $i % 8 == 0){ 
        //dann:
        //00110101 erstes Oktett und jeweils folgende      
        $temp = strrev($temp);
        //10101100 erstes Oktett und jeweils folgende werden gespiegelt

        //Oktett durch Schleife laufen lassen
        for($j=0;$j<8;$j++){
            //Oktett in zwei Hälften aufteilen
            if($j<4){
                //Bsp. 1. Oktett -> 1->0->1->0
                //Einzelwerte über Verkettung .= einfügen
                $binTemp1 .= $temp[$j];
            }else{
                //Bsp. 1. Oktett -> 1->1->0->0
                $binTemp2 .= $temp[$j];
            }
        }

        //mit der Funktion den Hexwert ermitteln und zwischenspeichern
        $hexTemp1 = binToHex($binTemp1);
        $hexTemp2 = binToHex($binTemp2);

        //Ausgabevariable je Durchlauf mit den Hexwerten 
        //und dem Separator befüllen (Verketten pro Durchlauf .= )
        $kanAusgabe .= $hexTemp1.$hexTemp2.$separator;

        //Temporäre Variablen wieder leeren, 
        //für nächsten Durchlauf in der Schleife
        $binTemp1 = '';
        $binTemp2 = '';

        $hexTemp1 = '';
        $hexTemp2 = '';
        
        $temp = '';
    }
    //solange Zeichen aus der Bitfolge je Index zur 
    //Temp-Variable hinzufügen ( .= ),
    //bis das jeweilige Oktett befüllt ist
    $temp .= $bit[$i];

    //Prüfen, wann das letzte Zeichen von der Bitfolge erreicht ist, 
    // um das letzte Oktett umzuwandeln (das letzte Oktett
    // kann nicht über die obere if geprüft werden, 
    //da der letzte Index 47 ist)
    if($i == 47){
        for($j=0;$j<8;$j++){
            if($j<4){
                $binTemp1 .= $temp[$j];
            }else{
                $binTemp2 .= $temp[$j];
            }
        }
        $hexTemp1 = binToHex($binTemp1);
        $hexTemp2 = binToHex($binTemp2);
        //beim letzten Oktett kann der Separator weggelassen werden
        $kanAusgabe .= $hexTemp1.$hexTemp2;
    }
    
}


    // Ausgabe der Werte
//    echo '<p>Eingabe: <b>' . htmlspecialchars($bit) . '</b></p>';
 //   echo '<p>Ausgabe: <b>' . htmlspecialchars($kanAusgabe) . '</b></p>';
}
// Funktionen

//Binärzahl übergeben - Rückgabe ist das Hexzeichen
function binToHex($bin){

    $hex = '';
    switch($bin){

        case '0000' : $hex ='0';
        break;
        case '0001' : $hex ='1';
        break;
        case '0010' : $hex ='2';
        break;
        case '0011' : $hex ='3';
        break;
        case '0100' : $hex ='4';
        break;
        case '0101' : $hex ='5';
        break;
        case '0110' : $hex ='6';
        break;
        case '0111' : $hex ='7';
        break;
        case '1000' : $hex ='8';
        break;
        case '1001' : $hex ='9';
        break;
        case '1010' : $hex ='A';
        break;
        case '1011' : $hex ='B';
        break;
        case '1100' : $hex ='C';
        break;
        case '1101' : $hex ='D';
        break;
        case '1110' : $hex ='E';
        break;
        case '1111' : $hex ='F';
        break;
    }

    //Rückgabewert der Funktion
    return $hex;

}

//Hexzeichen übergeben - Rückgabe ist das Binaerdecimal
function hexToBin($hex){

    $bin = '';
    switch($hex){

        case '0' : $bin ='0000';
        break;
        case '1' : $bin ='0001';
        break;
        case '2' : $bin ='0010';
        break;
        case '3' : $bin ='0011';
        break;
        case '4' : $bin ='0100';
        break;
        case '5' : $bin ='0101';
        break;
        case '6' : $bin ='0110';
        break;
        case '7' : $bin ='0111';
        break;
        case '8' : $bin ='1000';
        break;
        case '9' : $bin ='1001';
        break;
        case 'A' : $bin ='1010';
        break;
        case 'B' : $bin ='1011';
        break;
        case 'C' : $bin ='1100';
        break;
        case 'D' : $bin ='1101';
        break;
        case 'E' : $bin ='1110';
        break;
        case 'F' : $bin ='1111';
        break;
    }

    //Rückgabewert der Funktion
    return $bin;

}


?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MAC - BinToKan</title>
</head>
<body>

<h1>MAC-Adresse Converter</h1>
    <p>MAC-Adressen formatieren

Umwandlung Bitfolge oder kanonische Form<br>
<br>
Die 48 Bit der MAC-Adresse lasst sich als Bitfolge oder in kanonischer Form darstellen.<br>
Weil die Darstellung als Bitfolge zu lang ist, teilt man die 48 Bit in 6 Octette (jeweils 8 Bit)
auf.<br>
Jedes Octett wird dann als eine zweistellige hexadezimale Zahl dargestellt.<br>
Wichtig ist, vor der Umformung der dualen in die hexadezimale Darstellung wird das Octett
umgedreht (gespiegelt).<br>
Bei der hexadezimalen Darstellung (kanonische Form) werden die hexadezimalen<br>
Zeichenpaare entweder durch Bindestriche oder durch Doppelpunkte getrennt.<br>
Beispiel Bitfolge einer MAC-Adresse:<br>
0011010101111011 00010010 00000000 00000000 00000001<br>
Passende Kanonische Form der MAC-Adresse:<br>
AC-DE-48-00-00-80 oder AC:DE:48:00:00:80<br>

Gib eine MAC-Adresse in Bitfolge oder in der kanonischen Form ein:<br>
SEARCHBAR</p>
//Zeigt octets
<form action="." method="post">
        <input type="text" name="eingabe" required>
        <input type="submit" name ="submit" value="GO">
           
 </form>

 
    <?php 
        //Ausgabe der Werte
        echo '<p>Eingabe: <b>'.$bit.'</b></p>';

        echo '<p>Ausgabe: <b>'.$kanAusgabe.'</b></p>';

        echo '<h1>.................... </h1>';
        $kan = "AC-DE-48-00-00-80";
        $seperator=$kan[2];
        $kan = str_replace($seperator, "", $kan);//ACDE48000080
        for ($i=0; $i <12 ; $i++) { 
            if ($i>0 && $i % 2 == 0) {
                $temp=$kan[$i];//AC
                $tempBin1 = hexToBin($temp[0]);//1010
                $tempBin2 = hexToBin($temp[1]);//1100
                $binAusgabe .= strrev($tempBin1.$tempBin2);
             
            }
        }





    ?>

</body>
</html>