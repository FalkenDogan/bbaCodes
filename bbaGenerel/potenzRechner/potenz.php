<?php
function potenz($basis, $exponent) {
    $ergebnis = 1;
    for ($i = 0; $i < $exponent; $i++) {
        $ergebnis *= $basis;
    }
    return $ergebnis;
}

function result() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $basis = $_POST['basis'];
        $exponent = $_POST['exponent'];

        if ($basis < 0 || $exponent < 0) {
            return "<h3>Bitte geben Sie positive Zahlen ein.</h3>";
        } elseif (is_numeric($basis) && is_numeric($exponent)) {
            $result = potenz($basis, $exponent);
            return "<h3>$result</h3>";
        } else {
            return "<h3>Bitte geben Sie gültige Zahlen ein.</h3>";
        }
    }
    return ""; // Boş bir sonuç döndürür, POST isteği yoksa hiçbir şey gösterilmez.
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BBA</title>
    <link rel="stylesheet" href="style.css">    
</head>
<body>
    <header>
        <h1>POTENZ PROGRAMME</h1>
    </header>
    <main>
        <div class="form-container">
            <!-- Formun method özelliği POST olarak ayarlanmalı -->
            <form method="POST" action="">
                <label for="basis">Basis</label>
                <input id="basis" name="basis" placeholder="Basis">
                <label for="exponent">Exponent</label>
                <input id="exponent" name="exponent" placeholder="Exponent">
                <button type="submit">Berechnen</button>
            </form>
        </div>
        <div class="result-container">
           
             <table class="result-table">
                <tr>                    
                    <td class="result-textbox">Ergebnis</td>
                    <td class="result-textbox">
                        <?php 
                        $result = result();
                        echo $result !== "" ? $result : ""; 
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