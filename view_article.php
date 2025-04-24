<?php
include "db.php";
session_start();
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM articles WHERE id=$id");
$article = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
  <title><?= htmlspecialchars($article['title']) ?> - Wikipedia Clone</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f6f6f6;
      margin: 0;
      padding: 0;
    }
    .header {
      background: #2d3436;
      color: white;
      padding: 20px;
      text-align: center;
      font-size: 26px;
    }
    .container {
      max-width: 800px;
      margin: 40px auto;
      background: #fff;
      padding: 40px;
      border-radius: 12px;
      box-shadow: 0 4px 25px rgba(0,0,0,0.1);
    }
    .title {
      font-size: 30px;
      color: #2c3e50;
      margin-bottom: 10px;
    }
    .meta {
      font-size: 14px;
      color: #7f8c8d;
      margin-bottom: 20px;
    }
    .content {
      font-size: 18px;
      color: #2c3e50;
      line-height: 1.7;
    }
    .edit-btn {
      display: inline-block;
      margin-top: 30px;
      padding: 10px 20px;
      background: #0984e3;
      color: white;
      border: none;
      border-radius: 6px;
      text-decoration: none;
      font-size: 16px;
      transition: 0.3s;
    }
    .edit-btn:hover {
      background: #007acc;
    }
  </style>
</head>
<body>
  <div class="header">Wikipedia Clone</div>
  <div class="container">
    <div class="title"><?= htmlspecialchars($article['title']) ?></div>
    <div class="meta">By <?= htmlspecialchars($article['author']) ?> | Category: <?= htmlspecialchars($article['category']) ?></div>
    <div class="content"><?= nl2br(htmlspecialchars($article['content'])) ?></div>
    
    <?php if (isset($_SESSION['user']) && $_SESSION['user']['name'] === $article['author']) { ?>
      <a href="edit_article.php?id=<?= $article['id'] ?>" class="edit-btn">Edit Article</a>
    <?php } ?>
  </div>
</body>
</html>
