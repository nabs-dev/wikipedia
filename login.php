<?php include "db.php"; session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Login - Wikipedia Clone</title>
  <style>
    body { font-family: 'Segoe UI', sans-serif; background: #eef2f3; display: flex; justify-content: center; align-items: center; height: 100vh; }
    .form-box {
      background: #fff;
      padding: 40px 30px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      width: 400px;
      text-align: center;
    }
    h2 { margin-bottom: 20px; color: #2c3e50; }
    input {
      width: 100%;
      padding: 12px;
      margin: 10px 0;
      border-radius: 8px;
      border: 1px solid #ccc;
      font-size: 15px;
    }
    button {
      background: #27ae60;
      color: white;
      padding: 12px;
      width: 100%;
      font-size: 16px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      margin-top: 10px;
    }
    button:hover { background: #1f8c4d; }
    p { margin-top: 15px; font-size: 14px; }
    a { color: #27ae60; text-decoration: none; }
    a:hover { text-decoration: underline; }
  </style>
</head>
<body>
  <div class="form-box">
    <h2>Login to Continue</h2>
    <form method="POST">
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit" name="login">Login</button>
    </form>
    <p>Don't have an account? <a href="signup.php">Signup here</a></p>
    <?php
      if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $result = $conn->query("SELECT * FROM users WHERE email='$email'");
        if ($result->num_rows > 0) {
          $user = $result->fetch_assoc();
          if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user;
            echo "<script>window.location.href='index.php';</script>";
          } else {
            echo "<script>alert('Incorrect password.');</script>";
          }
        } else {
          echo "<script>alert('User not found.');</script>";
        }
      }
    ?>
  </div>
</body>
</html>
