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

// Fetch all items grouped by category
$sql = "SELECT * FROM household_items ORDER BY category";
$result = $conn->query($sql);

$items_by_category = [];
while ($row = $result->fetch_assoc()) {
    $items_by_category[$row['category']][] = $row;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Items for Moving & Packing</title>
    <style>
        body { font-family: Arial, sans-serif; margin: ; }
        .container { width: 70%; margin: auto; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid black; padding: 10px; text-align: center; }
        th { background-color:rgb(227, 17, 17); color:white;}
        .btn-submit { margin-top: 20px; padding: 10px; background: blue; color: white; border: none; cursor: pointer; }
        .category-title { background: #ddd; font-weight: bold; padding: 10px; margin-top: 20px; }
    </style>
</head>
<body>

<div class="container py-5">
    <h2>Select Items for Moving & Packing</h2>
    <form action="receipt" method="GET">
        
        <?php foreach ($items_by_category as $category => $items): ?>
            <h3 class="category-title"><?php echo htmlspecialchars($category); ?></h3>
            <table>
                <tr>
                    <th>Item Name</th>
                    <th>Moving (₹)</th>
                    <th>Packing (₹)</th>
                    <th>Move?</th>
                    <th>Pack?</th>
                </tr>
                
                <?php foreach ($items as $item): ?>
                    <tr>
                        <td><?php echo $item['item_name']; ?></td>
                        <td>₹ <?php echo number_format($item['moving_cost'], 2); ?></td>
                        <td>₹ <?php echo number_format($item['packing_cost'], 2); ?></td>
                        <td><input type="checkbox" name="move_items[]" value="<?php echo $item['id']; ?>"></td>
                        <td><input type="checkbox" name="pack_items[]" value="<?php echo $item['id']; ?>"></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endforeach; ?>

        <button type="submit" href="<?php echo base_url("home/receipt");?>" class="btn-submit">Generate Receipt</button>
    </form>
</div>

</body>
</html>