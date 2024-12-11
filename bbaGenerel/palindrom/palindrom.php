<?php
function isPalindrome($palindrome) {
    $palindrome = strtolower($palindrome);
    $reversed = strrev($palindrome);
    
    if ($palindrome == $reversed) {
        return "<h3>Das ist ein Palindrom</h3>";
    } else {
        return "<h3>Das ist nicht Palindrom</h3>";
    }
}
?>

<?php
function isPalindrome2($palindrome) {
    $palindrome = strtolower($palindrome);
    $reversed = strrev($palindrome);
    $newWort="";
    for($i=strlen($palindrome)-1; $i<strlen($palindrome);$i--)
    {
        $newWort=$newWort.$palindrome[$i];
        

    }

    if ($palindrome == $reversed) {
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
        <h1>PALINDROM PROGRAMME</h1>
    </header>
    <main>
        <div class="form-container">
            <!-- Formun method özelliği POST olarak ayarlanmalı -->
            <form method="POST" action="">
                <label for="palindrom">Is Palindrom</label>
                <input id="palindrom" name="palindrom" placeholder="Is Palindrom">
                
                <button type="submit">Send</button>
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
    <footer>
        <p>Main Page</p>
    </footer>



</body>
</html>