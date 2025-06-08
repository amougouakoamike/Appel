<?php
// Check if form was submitted and user_id is set
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["user_id"])) {
    $user_id = $_POST["user_id"];

    // Establish a new connection
    $conn = new mysqli("localhost", "root", "", "final_project");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind the delete statement
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    if ($stmt) {
        $stmt->bind_param("i", $user_id);
        if ($stmt->execute()) {
            // Optionally redirect back to the user list page
            echo "<script>
                    alert('User deleted successfully.');
                    window.location.href = 'dashboard.php'; // Change to your actual user list page
                  </script>";
        } else {
            echo "Error deleting user: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Failed to prepare statement: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request.";
}
?>
