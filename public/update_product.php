<?php
require_once "config.php";


if (isset($_POST['update'])) {
    $id = $_POST['product_id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category']; // iphone, mac-book, hear-pod

    // Process image
    $imagePath = null;
    if (!empty($_FILES['public']['image'])) {
        $targetDir = "uploads/public/";
        $imagePath = $targetDir . basename($_FILES["public"]["image"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath);
    }

    // Build query
    $query = "UPDATE products SET name = ?, price = ?" . ($imagePath ? ", image = ?" : "") . " WHERE id = ?";
    $stmt = $conn->prepare($query);

    if ($imagePath) {
        $stmt->bind_param("sdsi", $name, $price, $imagePath, $id);
    } else {
        $stmt->bind_param("sdi", $name, $price, $id);
    }

    $stmt->execute();

   $redirectPage = match($category) {
    'iphone' => 'index.php',
    'mac-book' => 'mac-book.php',
    'hear-pod' => 'hear-pot.php',
    default => 'index.php'
};

// Fix: prepend folder for image path if uploaded
$imageWebPath = $imagePath ? '/' . $imagePath : '';

echo "<script>
    const updatedId = $id;
    const updatedName = " . json_encode($name) . ";
    const updatedPrice = $price;
    const updatedImage = " . json_encode($imageWebPath) . ";
    const redirectPage = '$redirectPage';  

    let allProducts = JSON.parse(localStorage.getItem('allProducts')) || [];
    let productIndex = allProducts.findIndex(p => p.id == updatedId);

    if (productIndex !== -1) {
        allProducts[productIndex].name = updatedName;
        allProducts[productIndex].price = updatedPrice;
        if (updatedImage) {
            allProducts[productIndex].image = updatedImage;
        }
        localStorage.setItem('allProducts', JSON.stringify(allProducts));
    }

    alert('Product updated successfully!');
    window.location.href = redirectPage;
</script>";
}


?>

