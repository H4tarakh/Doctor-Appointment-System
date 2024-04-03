<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicine Delivery - Billing</title>
    <link rel="stylesheet" href="medsdel.css">
</head>
<body>
    <div class="container">
        <h2>Billing Details</h2>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST["name"];
            $cont = $_POST["cont"];
            $address = $_POST["address"];
            $pincode = $_POST["pincode"];
            $medicines = $_POST["medicine"];
            $quantities = $_POST["quantity"];

            echo "<p><strong>Name:</strong> $name</p>";
            echo "<p><strong>Contact No:</strong> $cont</p>";
            echo "<p><strong>Address:</strong> $address</p>";
            echo "<p><strong>Pincode:</strong> $pincode</p>";
            echo "<h3>Ordered Medicines:</h3>";
            echo "<ul>";
            $total = 0;
            for ($i = 0; $i < count($medicines); $i++) {
                $medicine = $medicines[$i];
                $quantity = $quantities[$i];
                $price = 0;
                if ($medicine == "Paracetamol") {
                    $price = 50;
                } elseif ($medicine == "Cipla") {
                    $price = 80;
                }
                $subtotal = $quantity * $price;
                $total += $subtotal;
                echo "<li>$medicine - Quantity: $quantity - Subtotal: Rs.$subtotal</li>";
            }
            echo "</ul>";
            echo "<h3>Total Amount: Rs.$total</h3>";
            echo "<p>Payment option: Cash on Delivery</p>";
        }
        ?>
    </div>
</body>
</html>
