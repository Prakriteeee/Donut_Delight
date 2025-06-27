<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Logged Out - Donut Delight Admin</title>
  <meta http-equiv="refresh" content="3;url=admin_login.php">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap');

    body {
      font-family: 'Quicksand', sans-serif;
      background: linear-gradient(to right, #fff0f5, #ffe6e6);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .logout-box {
      background: #fff;
      padding: 40px;
      border-radius: 20px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.1);
      text-align: center;
      border: 3px solid #ffc0cb;
    }

    h2 {
      color: #e75480;
      font-size: 26px;
      margin-bottom: 10px;
    }

    p {
      color: #444;
      font-size: 16px;
    }

    .loading {
      margin-top: 20px;
      font-size: 14px;
      color: #888;
    }
  </style>
</head>
<body>

<div class="logout-box">
  <h2>👋 You have been logged out!</h2>
  <p>Redirecting you to login page...</p>
  <div class="loading">Please wait a moment ⏳</div>
</div>

</body>
</html>
