<?php
include 'config.php'; // Ensure this sets up $conn

// Corrected SQL: Join using orders.user_id and users.id
$sql = "SELECT        
            orders.id AS order_id,
            users.email AS user_email,
            orders.name AS item_name,
            orders.image AS item_image,
            orders.total_quantity,
            orders.total_price
        FROM orders
        LEFT JOIN users ON orders.id = users.id
        ORDER BY orders.id DESC";

$result = $conn->query($sql);

if (!$result) {
    die("Query failed: " . $conn->error);
}

if ($result->num_rows > 0) {
    echo '<table>';
    echo '<thead>
            <tr>
                <th>Order ID</th>
                <th>User Email</th>
                <th>Image</th>
                <th>Total Quantity</th>
                <th>Total Price ($)</th>
                <th>Action</th>
            </tr>
          </thead>';
    echo '<tbody>';

    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($row['order_id']) . '</td>';
        echo '<td>' . htmlspecialchars($row['user_email']) . '</td>';

        if (!empty($row['item_image'])) {
            echo '<td><img src="' . htmlspecialchars($row['item_image']) . '" alt="Order Image" style="max-width: 80px; height: auto;" /></td>';
        } else {
            echo '<td>No Image</td>';
        }

        echo '<td>' . htmlspecialchars($row['total_quantity']) . '</td>';
        echo '<td>' . htmlspecialchars(number_format($row['total_price'], 2)) . '</td>';

        echo '<td>
                <form action="delete-order.php" method="POST" onsubmit="return confirm(\'Are you sure you want to delete this order?\');">
                    <input type="hidden" name="order_id" value="' . htmlspecialchars($row['order_id']) . '">
                    <input type="submit" value="Delete" style="background: red; color: white; border: none; padding: 5px 10px; border-radius: 5px; cursor: pointer;">
                </form>
              </td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
} else {
    echo '<p>No orders found.</p>';
}
?>


