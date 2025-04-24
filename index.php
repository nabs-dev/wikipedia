<?php include "db.php"; session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Wikipedia Clone - Home</title>
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body { font-family: 'Segoe UI', sans-serif; background: #f9fafb; color: #333; }
    header { background: #2c3e50; color: white; padding: 20px; text-align: center; }
    header h1 { margin-bottom: 10px; }
    .container { max-width: 1000px; margin: 30px auto; padding: 20px; }
    .search-box { text-align: center; margin-bottom: 30px; }
    .search-box input { width: 60%; padding: 12px; font-size: 16px; border: 1px solid #ccc; border-radius: 8px; }
    .article { background: white; border-radius: 10px; padding: 20px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); margin-bottom: 20px; transition: 0.3s ease; }
    .article:hover { box-shadow: 0 4px 12px rgba(0,0,0,0.15); }
    .article h2 { color: #2980b9; margin-bottom: 10px; cursor: pointer; }
    .nav { text-align: right; padding: 10px 20px; background: #ecf0f1; }
    .nav a { margin: 0 10px; text-decoration: none; color: #2c3e50; font-weight: bold; }
    .nav a:hover { color: #3498db; }
  </style>
</head>
<body>
  <header>
    <h1>Wikipedia Clone</h1>
    <p>Explore and contribute knowledge freely.</p>
  </header>
  <div class="nav">
    <?php if (isset($_SESSION['user'])): ?>
      Welcome, <?= $_SESSION['user']['name'] ?> |
      <a href="create_article.php">Create Article</a> |
      <a href="logout.php">Logout</a>
    <?php else: ?>
      <a href="login.php">Login</a> |
      <a href="signup.php">Signup</a>
    <?php endif; ?>
  </div>
  <div class="container">
    <div class="search-box">
      <input type="text" placeholder="Search articles..." onkeydown="if(event.key==='Enter') search(this.value)">
    </div>
    <?php
      $result = $conn->query("SELECT * FROM articles ORDER BY id DESC LIMIT 5");
      while ($row = $result->fetch_assoc()):
    ?>
      <div class="article" onclick="view(<?= $row['id'] ?>)">
        <h2><?= htmlspecialchars($row['title']) ?></h2>
        <p><?= nl2br(substr($row['content'], 0, 150)) ?>...</p>
      </div>
    <?php endwhile; ?>
  </div>
  <script>
    function view(id) {
      window.location.href = 'view_article.php?id=' + id;
    }
    function search(q) {
      window.location.href = 'search.php?query=' + encodeURIComponent(q);
    }
  </script>
</body>
</html>
