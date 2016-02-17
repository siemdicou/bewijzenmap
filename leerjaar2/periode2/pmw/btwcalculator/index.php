<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BTW Calculator</title>
</head>
<body>
    <form method="post" action="#">
        <label for="bedrag">Bedrag per product</label>
        <input type="text" name="bedrag" required><br>
        <label for='aantal'>Aantal producten</label>
        <input type="number" name="aantal" required>

        <label>BTW</label><br>
        <select name="country" required="required" size="5">
            <option value="NL" selected>NL</option>
            <option value="UK">UK</option>
            <option value="DE">DE</option>
            <option value="FR">FR</option>
            <option value="HON">HON</option>
        </select>
       <input type="reset" value="leeghalen">
        <input type="submit" value="sturen">
    </form>
<?php
    require 'calculator/ICalculator.php';
    require 'calculator/Calculator.php';


    if(isset($_POST['country']) && isset($_POST['bedrag']) && isset($_POST['aantal'])){
        if(is_numeric($_POST['bedrag']) && is_numeric($_POST['aantal'])) {
            $calculator = new Calculator($_POST['country']);
            echo $calculator->calculateBtw($_POST['bedrag'] * $_POST['aantal']);
        }
    }
?>
</body>
</html>