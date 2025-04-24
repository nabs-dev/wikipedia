<?php include "db.php"; session_start(); if (!isset($_SESSION['user'])) { echo "<script>window.location.href='login.php';</script>"; exit(); }
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM articles WHERE id=$id");
$article = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Edit Article - Wikipedia Clone</title>
  <style>
    body { font-family: 'Segoe UI', sans-serif; background: #f4f4f4; padding: 50px; }
    .container {
      background: white;
      max-width: 700px;
      margin: auto;
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0 6px 18px rgba(0,0,0,0.1);
    }
    h2 { color: #2c3e50; margin-bottom: 20px; text-align: center; }
    input, textarea, select {
      width: 100%;
      padding: 12px;
      margin: 10px 0 20px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 15px;
    }
    button {
      background: #27ae60;
      color: white;
      padding: 12px;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      cursor: pointer;
      width: 100%;
    }
    button:hover { background: #1e8449; }
  </style>
</head>
<body>
  <div class="container">
    <h2>Edit Article</h2>
    <form method="POST">
      <input type="text" name="title" value="<?= htmlspecialchars($article['title']) ?>" required>
      <textarea name="content" rows="10" required><?= htmlspecialchars($article['content']) ?></textarea>
      <input type="text" name="category" value="<?= htmlspecialchars($article['category']) ?>" required>
      <button type="submit" name="update">Update Article</button>
    </form>
    <?php
      if (isset($_POST['update'])) {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $category = $_POST['category'];
        $conn->query("UPDATE articles SET title='$title', content='$content', category='$category' WHERE id=$id");
        echo "<script>alert('Article updated successfully!'); window.location.href='view_article.php?id=$id';</script>";
      }
    ?>
  </div>
</body>
</html>
