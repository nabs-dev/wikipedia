<?php include "db.php"; session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Signup - Wikipedia Clone</title>
  <style>
    body { font-family: 'Segoe UI', sans-serif; background: #f1f1f1; display: flex; justify-content: center; align-items: center; height: 100vh; }
    .form-box {
      background: #fff;
      padding: 40px 30px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      width: 400px;
      text-align: center;
    }
    h2 { margin-bottom: 20px; color: #34495e; }
    input {
      width: 100%;
      padding: 12px;
      margin: 10px 0;
      border-radius: 8px;
      border: 1px solid #ccc;
      font-size: 15px;
    }
    button {
      background: #2980b9;
      color: white;
      padding: 12px;
      width: 100%;
      font-size: 16px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      margin-top: 10px;
    }
    button:hover { background: #1c6391; }
    p { margin-top: 15px; font-size: 14px; }
    a { color: #2980b9; text-decoration: none; }
    a:hover { text-decoration: underline; }
  </style>
</head>
<body>
  <div class="form-box">
    <h2>Contributor Signup</h2>
    <form method="POST">
      <input type="text" name="name" placeholder="Full Name" required>
      <input type="email" name="email" placeholder="Email Address" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit" name="submit">Sign Up</button>
    </form>
    <p>Already have an account? <a href="login.php">Login here</a></p>
    <?php
      if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $conn->query("INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')");
        echo "<script>alert('Signup successful! Redirecting to login...'); window.location.href='login.php';</script>";
      }
    ?>
  </div>
</body>
</html>
