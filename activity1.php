<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendo Machine</title>
</head>
<body>

      <form method="post">
	        <fieldset>
	            <legend>Products:</legend>
	            <label><input type="checkbox" name="items[]" value="Coke"> Coke - ₱15 </label>  <br>

	            <label><input type="checkbox" name="items[]" value="Sprite"> Sprite - ₱20</label><br>

	            <label><input type="checkbox" name="items[]" value="Royal"> Royal - ₱20</label><br>
	            
                <label><input type="checkbox" name="items[]" value="Pepsi"> Pepsi - ₱15</label><br>
	            
                <label><input type="checkbox" name="items[]" value="Mountain Dew"> Mountain Dew - ₱20</label>
	        </fieldset>

            <fieldset>
	            <legend>Options:</legend>
	            <label for="size">Size:</label>
	            <select id="size" name="size">
	                <option value="regular">Regular</option>
	                <option value="up-size">Up-Size (add ₱5)</option>
	                <option value="jumbo">Jumbo (add ₱10)</option>
	            </select>
	            <label for="quantity">Quantity:</label>
	            <input type="number" id="quantity" name="quantity" min="0" value="1">
	            <button type="submit" name="btnCheckOut">Check Out</button>

	        </fieldset>
	    </form>
    
     
        <?php
            if (isset($_POST['btnCheckOut'])):
                $prices = [
                    'Coke' => 15,
                    'Sprite' => 20,
                    'Royal' => 20,
                    'Pepsi' => 15,
                    'Mountain Dew' => 20,
                ];
                $selectedItems = $_POST['items'] ?? [];
                $size = $_POST['size'] ?? 'regular';
                $quantity = $_POST['quantity'] ?? 0;

              
                if (empty($selectedItems)) {
                    echo "<hr><h1>No Selected Item, please choose.</h1>";
                } else {
                  
                    $sizeAdjustment = match ($size) {
                        'up-size' => 5,
                        'jumbo' => 10,
                        'regular' => 0,
                    };
                    $totalItems = 0;
                    $totalPrice = 0;

                    echo "<hr><h4>Purchase Summary:</h4>
                    <ul>";
                    foreach ($selectedItems as $products) {
                        $productsPrice = $prices[$products] ?? 0;
                        $itemTotal = ($productsPrice + $sizeAdjustment) * $quantity;
                        $totalPrice += $itemTotal;
                        $totalItems += $quantity;

                       
                        $quantityText = $quantity > 1 ? "$quantity pieces of" : "1 piece of";
                        $sizeText = $size;
                        echo "<li>$quantityText $sizeText $products amounting to ₱$itemTotal</li>";
                    }
                    echo "</ul>";
                    echo "<p><b>Total Number of Items:</b> $totalItems</p>";
                    echo "<p><b>Total Price:</b> ₱$totalPrice</p>";
                }
            endif;
        ?>


        
</body>
</html>