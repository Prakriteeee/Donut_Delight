<?php
session_start();
$conn = new mysqli("localhost", "root", "", "store");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$successMsg = "";
$errorMsg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $discount = $_POST['discount'];
    $image = $_POST['image'];

    $stmt = $conn->prepare("INSERT INTO products (name, price, discount, image) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sdis", $name, $price, $discount, $image);

    if ($stmt->execute()) {
        $successMsg = "✅ Product added successfully!";
    } else {
        $errorMsg = "❌ Error: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Product - Donut Delight Admin</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@500;700&display=swap');

    * {
      box-sizing: border-box;
    }

    body {
      background: linear-gradient(135deg, #fff0f5, #ffe6e6);
      font-family: 'Quicksand', sans-serif;
      padding: 40px;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .form-container {
      background: #fff;
      padding: 35px 30px;
      max-width: 500px;
      width: 100%;
      border-radius: 20px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      border: 3px solid #ffc0cb;
    }

    .form-container h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #e75480;
      font-weight: 700;
    }

    input, button {
      width: 100%;
      padding: 12px 15px;
      margin: 12px 0;
      font-size: 15px;
      border: 2px solid #ffd1dc;
      border-radius: 10px;
      background: #fffafc;
      transition: all 0.2s ease;
    }

    input:focus {
      outline: none;
      border-color: #e75480;
      background: #fff;
    }

    button {
      background-color: #ff69b4;
      color: white;
      font-weight: bold;
      cursor: pointer;
      border: none;
    }

    button:hover {
      background-color: #e75480;
    }

    .success {
      background: #d4edda;
      color: #155724;
      padding: 10px;
      border-radius: 8px;
      margin-bottom: 15px;
      text-align: center;
    }

    .error {
      background: #f8d7da;
      color: #721c24;
      padding: 10px;
      border-radius: 8px;
      margin-bottom: 15px;
      text-align: center;
    }

    .form-container input::placeholder {
      color: #c88;
    }

    .form-container form {
      margin-top: 10px;
    }
  </style>
</head>
<body>

<div class="form-container">
  <h2>🍩 Add New Product</h2>

  <?php if ($successMsg): ?>
    <p class="success"><?= $successMsg ?></p>
  <?php endif; ?>

  <?php if ($errorMsg): ?>
    <p class="error"><?= $errorMsg ?></p>
  <?php endif; ?>

  <form method="POST">
    <input type="text" name="name" placeholder="Product Name " required>
    <input type="number" name="price" step="0.01" placeholder="Price " required>
    <input type="number" name="discount" placeholder="Discount (%) (e.g., 10)" required>
    <input type="text" name="image" placeholder="Image Path" required>
    <button type="submit">Add Product</button>
  </form>
</div>

</body>
</html>


