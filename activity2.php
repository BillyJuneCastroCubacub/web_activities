<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peys App</title>
</head>
<body>
    <h1>Peys App</h1>

    <form method="post">
        <label for="SizeRange">Select Photo Size: </label>
        <input type="range" name="SizeRange" id="SizeRange"><br>
        <label for="colorBorder">Select Border Color:</label>
        <input type="color" name="colorBorder" id="colorBorder">
        <button type="submit" name="btnProcess">Process</button><br><br>

        <?php 
        if (isset($_POST['btnProcess'])) { 
            $colorBorder = $_POST['colorBorder'];
            $imgSize = $_POST['SizeRange'];
        }
        ?>
        <img src="me.png" alt="" width="<?php echo empty($imgSize) ? '20' : $imgSize; ?>%" height="<?php echo empty($imgSize) ? '20' : $imgSize; ?>%" style="border:5px solid <?php echo empty($colorBorder) ? '#000000' : $colorBorder; ?>;">
    </form>
</body>
</html>