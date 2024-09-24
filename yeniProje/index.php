<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
 
 for ($i=0; $i <26 ; $i++) { 
    
    if($i!=0 && $i%5==0){
        echo "<br> ";
    }
        echo chr((65+$i))." ";
 }

 echo '<h2>ASCII Tablosu</h2>';
echo ord('A')."<br>";

echo chr(65)."<br>";

echo ord('Z')."<br>";
echo '<h2>Continiue Break</h2>';

for ($i=0; $i <33 ; $i++) { 
    
    if($i==13){
     
        
        echo " Die 13 ist eine Unglückzahl, ich breche hier ab!!!  <br> ";
    
    break;
    }
     
echo $i;
}

for ($i=0; $i <33 ; $i++) { 
    
    if($i==13){
     
        
        echo " Die 13 ist eine Unglückzahl, ich überspringe sie einfach!!!  <br> ";
    
        continue;
    }
    
echo $i;
}



?>    

</body>
</html>