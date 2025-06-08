<?php
 session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Dashboard</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background:#fff;
    }
    header {
      background: #2095ae;
      color: white;
      padding: 1em;
      text-align: center;
    }
    nav {
      background: #0f2454;
      color: white;
      padding: 0.5em;
      text-align: center;
    }
    section {
      padding: 1em;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin: 1em 0;
    }
    table, th, td {
      border: 1px solid #ccc;
    }
    th, td {
      padding: 0.75em;
      text-align: left;
    }.update-form {
  background: #ffffff;
  padding: 2em;
  max-width: 500px;
  margin: 2em auto;
  box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
  border-radius: 12px;
  font-size: 1rem;
  color: #333;
  border: 1px solid #e0e0e0;
}

.update-form label {
  font-weight: 600;
  margin-top: 1.2em;
  display: block;
  color: #0f2454;
  font-size: 0.95rem;
}

.update-form input[type="text"],
.update-form input[type="number"],
.update-form input[type="file"],
.update-form select {
  width: 100%;
  padding: 0.75em 1em;
  margin-top: 0.3em;
  margin-bottom: 1em;
  border: 1px solid #ccc;
  border-radius: 8px;
  font-size: 1rem;
  box-sizing: border-box;
  transition: border-color 0.3s ease;
}

.update-form input:focus,
.update-form select:focus {
  outline: none;
  border-color: #2095ae;
  box-shadow: 0 0 0 3px rgba(32, 149, 174, 0.1);
}

.update-form input[type="submit"] {
  background-color: #0f2454;
  color: white;
  border: none;
  padding: 0.75em 1.5em;
  border-radius: 8px;
  font-size: 1rem;
  font-weight: bold;
  width: 100%;
  cursor: pointer;
  transition: background 0.3s ease;
}

.update-form input[type="submit"]:hover {
  background-color: #2095ae;
}

.update-form select {
  appearance: none;
  background-color: #fff;
}

.heading{
  text-align: center;
  align-items: center;
  text-transform: uppercase;
  margin-top: 5rem;
}

  </style>
</head>
<body>
  <header>
    <h1>Admin Dashboard</h1>
  </header>
  <nav>
    <span>Orders | Users | Update Items</span>
  </nav>
  <section>
    <h2>Orders</h2>
    <?php include 'fetch_order.php'; ?>

    <h2>Users</h2>
    <div class="stats">
      <?php include 'user_stats.php'; ?>
    </div>

    <h2 class="heading">Update Product</h2>
   <form class="update-form" method="POST" enctype="multipart/form-data">
  <label for="product_id">Product ID</label>
  <input type="number" name="product_id" id="product_id" placeholder="Enter Product ID" required>

  <label for="title">Product Title</label>
  <input type="text" name="name" id="name" placeholder="Enter New Title" required>

  <label for="price">Price ($)</label>
  <input type="number" name="price" step="0.01" id="price" placeholder="Enter New Price" required>

  <label for="image">Upload Image</label>
  <input type="file" name="image" id="image">

   <label for="category">Select Category</label>
   <select name="category" id="category" required>
    <option value="">-- Choose Category --</option>
    <option value="iphone" >iPhone</option>
    <option value="mac-book">MacBook</option>
    <option value="hear-pod">Earpod</option>
  </select>
  <input type="submit" name="update" value="Update Product">
</form>
  </section>
</body>
</html>

