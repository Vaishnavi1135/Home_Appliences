<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "adminnew";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get POST data
$item_name = $_POST['item_name'];
$category = $_POST['category'];
$packing_cost = $_POST['packing_cost'];
$moving_cost = $_POST['moving_cost'];

// Insert new item
$sql = "INSERT INTO household_items (item_name, category, packing_cost, moving_cost)
        VALUES ('$item_name', '$category', '$packing_cost', '$moving_cost')";

if ($conn->query($sql) === TRUE) {
    echo "New item added successfully. <a href='selectitem.php'>Go back</a>";  // Replace 'your_page.php' with the page that displays the item list
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
