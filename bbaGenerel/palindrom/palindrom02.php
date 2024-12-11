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
        <h1>PALINDROM PROGRAMME02</h1>
    </header>
    <main>
        <div class="form-container">
            <form method="POST" action="">
                <label for="palindrom">Is Palindrom</label>
            <input type="text" name="palindrom" placeholder="Is Palindrom">
                <button type="submit" name="submit">Send</button>
            </form>
        </div>
        <div class="result-container">
           
             <table class="result-table">
                <tr>                    
                    <td class="result-textbox">Ergebnis</td>
                    <td class="result-textbox">
                        <?php 
                        if (isset($_POST['palindrom'])) {
                            $result = isPalindrome($_POST['palindrom']);
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