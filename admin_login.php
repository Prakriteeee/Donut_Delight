<?php
session_start();
$conn = new mysqli("localhost", "root", "", "store");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM admin WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $admin = $stmt->get_result()->fetch_assoc();

    if ($admin && password_verify($password, $admin['password'])) {
        $_SESSION['admin_logged_in'] = true;
        header("Location: dashboard.php");
        exit;
    }

    $error = "Invalid username or password!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Login - Donut Delight</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      background: linear-gradient(135deg, #ffe6f0, #fdd9e5);
      font-family: 'Poppins', sans-serif;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .login-box {
      background: #fff;
      padding: 40px;
      border-radius: 20px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      max-width: 400px;
      width: 100%;
      border: 3px solid #ff99cc;
      text-align: center;
    }

    .login-box h2 {
      margin-bottom: 20px;
      color: #e75480;
    }

    input[type="text"], input[type="password"] {
      width: 100%;
      padding: 12px;
      margin: 12px 0;
      border: 2px solid #ffccdd;
      border-radius: 10px;
      background: #fff0f5;
      font-size: 16px;
    }

    input:focus {
      outline: none;
      border-color: #e75480;
      background-color: #fff;
    }

    button {
      width: 100%;
      padding: 12px;
      margin-top: 15px;
      background-color: #e75480;
      color: white;
      border: none;
      border-radius: 10px;
      font-size: 16px;
      cursor: pointer;
    }

    button:hover {
      background-color: #d64571;
    }

    .error {
      color: #c0392b;
      margin-top: 20px;
    }

    .logo {
      width: 80px;
      margin-bottom: 15px;
    }
  </style>
</head>
<body>

  <div class="login-box">
    <img src="donut-logo.png" alt="Donut Delight Logo" class="logo">
    <h2>Admin Login</h2>
    <form method="POST">
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Login</button>
    </form>

    <?php if ($error): ?>
      <p class="error"><?= $error ?></p>
    <?php endif; ?>
  </div>

</body>
</html>


















