<!DOCTYPE html>
<html>
<head>
    <title>MAC-Adresse Converter</title>
</head>
<body>
<div style="background-color: lightblue; text-align: center; padding: 20px;">
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
 
$count =1;
while(true){
    
$message= "";
if(isset($_POST['submit'])){
$eingabe =str_replace(" ", "",$_POST['eingabe']);

/*
$temp="";
for ($i=0; $i <48 ; $i++) { 
    $temp .=$eingabe[$i];
    if ($i%8 ==0 && $i>0) {
          
        $temp="";        
    }
}
*/

//first control
if (strlen($eingabe)<17) {
    echo "Ungültige bitfolge";
break;
}

if(strlen($eingabe) == 48){
//ggf.Bitfolge
//BINAR CONTROL
for ($i=0; $i < strlen($eingabe); $i++) { 
    if($eingabe[$i] != 0 && $eingabe[$i] != 1){
        $message= "<p> Ungültige Bitfolge!</p>";
      
        break;
    }else{
        $message = "<p>Gültige Bitfolge</p>";
    }
}

//eingabe zu octet
$octets = [];
for ($i = 0; $i < 48; $i += 8) {
    $octets[] = substr($eingabe, $i, 8);
}
//octet zu hexadecimal
$neuHex ='';
foreach($octets as $octet){
    //echo 'Octet : '. $octet.'<br>';
    $firstHalf = substr($octet, 0, 4);
    $secondHalf = substr($octet, 4, 4);
    
    // İlk yarıyı hexadecimal formata çevir
    $firstHex = binaryToHex($firstHalf); 
   // echo "firstHalf: " . $firstHalf . "   " . "firstHex: " . $firstHex . "<br>";
    
    // İkinci yarıyı hexadecimal formata çevir
    $secondHex = binaryToHex($secondHalf);
  //  echo "secondHalf: " . $secondHalf . "   " . "secondHex: " . $secondHex . "<br>";
    $neuHex .= $firstHex.$secondHex .":";
   
}
echo "Hexadecimal : ".$neuHex;  


// Octetleri işleme veya görüntüleme
//$message .= "<p>Octets: " . implode(", ", $octets) . "</p>";
}

//octet zu decimal
$decimalOctets = [];
        foreach ($octets as $octet) {
            $decimalOctets[] = bindec($octet);
        }

 // Onluk sistemdeki Octetleri görüntüleme
 $message .= "<p>Octets (Decimal): " . implode(", ", $decimalOctets) . "</p>";

//HEXA DECIMAL CONTROL
}else if (strlen($eingabe) == 17){
    // ggf. kanonische Form
    if (preg_match('/^([0-9A-Fa-f]{2}[:-]){5}([0-9A-Fa-f]{2})$/', $eingabe)) {
        $message = "<p>Gültige kanonische Form</p>";
    } else {
        $message = "<p>Ungültige kanonische Form!</p>";
    }
}else{

$message= "Ungültige Eingabe!";


}

echo $message;

$count +=1;
if ($count ==2) {
    break;
}
}//while
function binaryToHex($bin){
    switch ($bin) {
        case '0000':
            $hex ='0';
               break;
        case '0001':
         $hex ='1';
            break;
        case '0010':
            $hex ="2";
            break;
        case '0011':
            $hex ="3";
            break;
        case '0100':
            $hex ="4";
            break;
        case '0101':
            $hex ="5";
            break;
        case '0110':
            $hex ="6";
            break; 
        case '0111':
            $hex ="7";
            break;
        case '1000':
            $hex ="8";
            break;
        case '1001':
            $hex ="9";
            break;
        case '1010':
            $hex ="A";
            break;
        case '1011':
            $hex ="B";
            break;
        case '1100':
            $hex ="C";
            break;
        case '1101':
            $hex ="D";
            break;
        case '1110':
            $hex ="E";
            break;
        case '1111':
            $hex ="F";
            break;
        default:
           $hex= "falsche Eingabe";
            break;           
    }
    return $hex;
}
?>
 </div>
</body>
</html>