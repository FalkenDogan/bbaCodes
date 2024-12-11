<?php
function isPalindrome($palindrome) {
    $palindrome = strtolower($palindrome);
    $reversed = strrev($palindrome);
    $newWort="";
    for($i=strlen($palindrome)-1; $i>-1;$i--)
    {
        $newWort=$newWort.$palindrome[$i];

    }

    if ($palindrome == $newWort) {
        return "<h3>Das ist ein Palindrom</h3>";
    } else {
        return "<h3>Das ist nicht Palindrom</h3>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>PALINDROM PROGRAMME03</h1>
    </header>
    <main>
        <div class="form-container">
        <form method="get" action="palindrom03.php">
                <label for="palindrom">Is Palindrom</label>
            <input type="text" name="eingabe" placeholder="Is Palindrom">
                <button type="submit" name="submit">Send</button>
            </form>
        </div>
        <div class="result-container">
           
             <table class="result-table">
                <tr>                    
                    <td class="result-textbox">Ergebnis</td>
                    <td class="result-textbox">
                        <?php 
                     if (isset($_GET['eingabe'])) {
                        $result = isPalindrome($_GET['eingabe']);
                        echo $result;
                    }                   
                        ?>
                    </td>
                </tr>
            </table>
        </div>
    </main>
    
</body>
</html>