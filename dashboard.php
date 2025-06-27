<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Panel - Donut Delight</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@500;700&display=swap');

    body {
      font-family: 'Quicksand', sans-serif;
      background: linear-gradient(to right, #fff0f5, #ffe6e6);
      margin: 0;
      padding: 60px 20px;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .admin-panel {
      background: #ffffff;
      padding: 40px;
      border-radius: 20px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.1);
      text-align: center;
      max-width: 400px;
      width: 100%;
      border: 3px solid #ffc0cb;
    }

    h2 {
      color: #e75480;
      margin-bottom: 30px;
      font-weight: 700;
    }

    a {
      display: inline-block;
      text-decoration: none;
      margin: 10px;
      padding: 12px 24px;
      background-color: #ff69b4;
      color: #fff;
      border-radius: 10px;
      font-size: 16px;
      transition: background 0.3s ease;
    }

    a:hover {
      background-color: #e75480;
    }

    a:first-of-type {
      margin-right: 20px;
    }
  </style>
</head>
<body>

<div class="admin-panel">
  <h2>🎉 Welcome, Admin!</h2>
  <a href="add_product.php">➕ Add Product</a>
  <a href="logout.php">🚪 Logout</a>
</div>

</body>
</html>

