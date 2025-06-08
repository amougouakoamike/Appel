<?php
require_once "config.php";
session_start(); 
$_SESSION['loggedin'] = true;
$_SESSION['name'] = $name;
$_SESSION['profile_image'] = 'uploads/users/' . $userId . '.jpg'; // or whatever path you store


if(isset($_POST['logginBtn'])){
$email = $_POST['email'];
$password = $_POST['password'];
$role = $_POST['role'];

$query = "INSERT INTO users(email, password,role) VALUES('$email', '$password','$role')";
$result = mysqli_query($conn, $query);

if ($result) {
    $_SESSION['loggedin'] = true;
    $_SESSION['email'] = $email;
    $_SESSION['message'] = "Welcome back, $email!";
if ($role === 'admin') {
header('Location: dashboard.php');
} else {
header('Location: index.php');
}
exit(); // Make sure to exit after header redirect
}else{
exit();
}  
} 
     
 if(isset($_POST['registerBtn'])){
     $name = $_POST['name'];
     $email = $_POST['email'];
     $password = $_POST['password'];
     $role = $_POST['role'];
 
     $query = "INSERT INTO users (name,	email, password, role) VALUES('$name','$email','$password','$role')";
     $result = mysqli_query($conn, $query);
 
     if ($result) {
         $_SESSION['loggedin'] = true;
         $_SESSION['name'] = $name;
         $_SESSION['email'] = $email;
         $_SESSION['message'] = "Welcome back, $name or $email!";
        if ($role === 'admin') {
          header('Location: dashboard.php');
            } else {
          header('Location: index.php');
            }
         exit();
     }else{
        exit();
     }      
 } 
 



ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();
header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "final_project";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "Database connection failed: " . $conn->connect_error]));
}

$input = file_get_contents("php://input");
error_log("Raw input: $input");

$data = json_decode($input, true);
error_log("Parsed data: " . print_r($data, true));

if (!isset($data['items']) || !is_array($data['items']) || count($data['items']) === 0) {
    echo json_encode(["status" => "error", "message" => "No items received"]);
    exit();
}

try {
    if (!$conn->begin_transaction()) {
        throw new Exception("Failed to begin transaction: " . $conn->error);
    }

    // Assuming no user_id is being inserted
    $stmt = $conn->prepare("INSERT INTO orders(name,image,total_quantity,total_price) VALUES (?, ?, ?, ?)");
    if (!$stmt) {
        throw new Exception("Prepare failed: " . $conn->error);
    }

    foreach ($data['items'] as $item) {
        error_log("Processing item: " . json_encode($item));

        if (
            empty($item['product_title']) || 
            empty($item['image']) ||
            !is_numeric($item['product_price']) ||
            !is_numeric($item['quantity'])
        ) {
            throw new Exception("Invalid item structure: " . json_encode($item));
        }
        $product_title = $item['product_title'];
        $product_image = $item['image'];
        $quantity = (int)$item['quantity'];
        $total_price = (float)$item['product_price'] * $quantity;

        error_log("Inserting: name=$product_title, image=$product_image, qty=$quantity, total=$total_price");

        $stmt->bind_param("ssid", $product_title, $product_image, $quantity, $total_price);

        if (!$stmt->execute()) {
            throw new Exception("MySQL error: " . $stmt->error);
        }
    }

    $conn->commit();
    echo json_encode(["status" => "success", "message" => "Order placed successfully"]);
    error_log("Transaction committed.");
} catch (Exception $e) {
    $conn->rollback();
    error_log("Error placing order: " . $e->getMessage());
    echo json_encode(["status" => "error", "message" => "Error: " . $e->getMessage()]);
} finally {
    $conn->close();
}



?>



























 
 
