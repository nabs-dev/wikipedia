<?php include "db.php"; session_start();
if (!isset($_SESSION['user'])) echo "<script>window.location.href='login.php';</script>";
?>
<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
  <style>
    body { font-family: sans-serif; background: #f4f4f4; padding: 30px; }
    .nav { margin-bottom: 20px; }
    .nav button { padding: 10px; background: #28a; color: white; border: none; cursor: pointer; margin-right: 10px; }
  </style>
</head>
<body>
  <div class="nav">
    <button onclick="create()">Create Article</button>
    <button onclick="logout()">Logout</button>
  </div>
  <h2>Welcome, <?php echo $_SESSION['user']['name']; ?>!</h2>
  <script>
    function create() {
      window.location.href = 'create_article.php';
    }
    function logout() {
      window.location.href = 'logout.php';
    }
  </script>
</body>
</html>
