<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "adminnew"; // Change DB name accordingly

// Create Connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch selected items
$move_ids = isset($_GET['move_items']) ? $_GET['move_items'] : [];
$pack_ids = isset($_GET['pack_items']) ? $_GET['pack_items'] : [];

$all_ids = array_unique(array_merge($move_ids, $pack_ids));
$total_moving_cost = 0;
$total_packing_cost = 0;
$items_data = [];

if (!empty($all_ids)) {
    $ids = implode(',', array_map('intval', $all_ids)); // Prevent SQL injection
    $sql = "SELECT * FROM household_items WHERE id IN ($ids)";
    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        $row['move_selected'] = in_array($row['id'], $move_ids);
        $row['pack_selected'] = in_array($row['id'], $pack_ids);
        if ($row['move_selected']) $total_moving_cost += $row['moving_cost'];
        if ($row['pack_selected']) $total_packing_cost += $row['packing_cost'];
        $items_data[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt - Movers & Packers</title>
    <style>
        body { font-family: Arial, sans-serif; margin: ; }
        .container { width: 60%; margin: auto; border: 1px solid black; padding: 20px; margin-top: 20px; margin-bottom: 20px; }
        h2 { text-align: center; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid black; padding: 10px; text-align: center; }
        th { background-color:rgb(244, 16, 16); color:white; }
        .total { font-weight: bold; }
        .btn-print { margin-top: 20px; display: block; text-align: center; margin-bottom: 20px; }

        @media print {
            body * { visibility: hidden; }
            .container, .container * { visibility: visible; }
            .container { position: absolute; left: 0; top: 0; width: 100%; }
        }
    </style>
</head>
<body>

<div class="container py-5" id="receipt">
    <h2>Movers & Packers - Receipt</h2>
    <p><strong>Date:</strong> <?php echo date("d M Y, h:i A"); ?></p>
    <p><strong>Order ID:</strong> <?php echo rand(10000, 99999); ?></p>

    <table>
        <tr>
            <th>Item Name</th>
            <th>Moving Cost (₹)</th>
            <th>Packing Cost (₹)</th>
            <th>Selected for Moving?</th>
            <th>Selected for Packing?</th>
        </tr>
        
        <?php foreach ($items_data as $item): ?>
            <tr>
                <td><?php echo $item['item_name']; ?></td>
                <td>₹ <?php echo $item['move_selected'] ? number_format($item['moving_cost'], 2) : '-'; ?></td>
                <td>₹ <?php echo $item['pack_selected'] ? number_format($item['packing_cost'], 2) : '-'; ?></td>
                <td><?php echo $item['move_selected'] ? '✅' : '❌'; ?></td>
                <td><?php echo $item['pack_selected'] ? '✅' : '❌'; ?></td>
            </tr>
        <?php endforeach; ?>

        <tr class="total">
            <td><strong>Total</strong></td>
            <td><strong>₹ <?php echo number_format($total_moving_cost, 2); ?></strong></td>
            <td><strong>₹ <?php echo number_format($total_packing_cost, 2); ?></strong></td>
            <td colspan="2"></td>
        </tr>
    </table>

    <div class="btn-print">
        <button onclick="printReceipt()">Print Receipt</button>
    </div>
</div>

<script>
    function printReceipt() {
        window.print();
    }
</script>

</body>
</html>
