<?php

// Establish a new connection
$conn = new mysqli("localhost", "root", "", "final_project");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get all users
$result = $conn->query("SELECT id, name, email FROM users");

if ($result && $result->num_rows > 0) {
    echo '<table border="1" style="border-collapse: collapse; width: 60%; margin-top: 20px;">';
    echo '<thead>
            <tr>
                <th colspan="4">Registered Users</th>
            </tr>
            <tr>
                <th>User ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
          </thead>';
    echo '<tbody>';

    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($row['id']) . '</td>';
        echo '<td>' . htmlspecialchars($row['name']) . '</td>';
        echo '<td>' . htmlspecialchars($row['email']) . '</td>';
        echo '<td>
                <form action="delete-user.php" method="POST" onsubmit="return confirm(\'Are you sure you want to delete this user?\');">
                    <input type="hidden" name="user_id" value="' . htmlspecialchars($row['id']) . '">
                    <input type="submit" value="Delete" style="background: red; color: white; border: none; padding: 5px 10px; border-radius: 5px; cursor: pointer;">
                </form>
              </td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
} else {
    echo "<p>No users found.</p>";
}
$conn->close();


?>
