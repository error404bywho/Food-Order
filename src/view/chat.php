<?php
session_start();

// Tên file lưu trữ bình luận
$commentFile = "comment.txt";

// Xử lý lưu bình luận khi có dữ liệu POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $message = trim($_POST['message']);
    $email = isset($_SESSION['email']) ? $_SESSION['email'] : null;
    $timestamp = (new DateTime())->format('Y-m-d H:i:s');


    if ($name && $message) {
        $commentData = [
            'name' => htmlspecialchars($name, ENT_QUOTES, 'UTF-8'),
            'message' => htmlspecialchars($message, ENT_QUOTES, 'UTF-8'),
            'email' => htmlspecialchars($email ?? 'unknown@example.com', ENT_QUOTES, 'UTF-8'),
            'timestamp' => $timestamp,
        ];

        // Mở file và ghi dữ liệu mới
        $file = fopen($commentFile, 'a');
        fwrite($file, json_encode($commentData) . "\n");
        fclose($file);
    }
    // Chuyển hướng để tránh gửi lại dữ liệu khi refresh trang
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Đọc bình luận từ file
$comments = [];
if (file_exists($commentFile)) {
    $file = fopen($commentFile, 'r');
    while (($line = fgets($file)) !== false) {
        $comments[] = json_decode($line, true);
    }
    fclose($file);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Comment Section</title>
  <script type="module" src="https://cdn.jsdelivr.net/npm/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://cdn.jsdelivr.net/npm/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: column;
      height: 100vh;
    }

    .comment-container {
      flex: 1;
      display: flex;
      flex-direction: column;
      padding: 10px;
      overflow-y: auto;
      background-color: #f5f5f5;
    }

    .comment {
      display: flex;
      align-items: flex-start;
      margin: 10px 0;
      padding: 10px;
      border-radius: 10px;
      background-color: #e0e0e0;
    }

    .comment ion-icon {
      font-size: 24px;
      margin-right: 10px;
      color: hsl(24.2,95.3%,58.2%);
    }

    .comment-content {
      display: flex;
      flex-direction: column;
    }

    .comment-content .name {
      font-weight: bold;
      margin-bottom: 2px;
    }

    .comment-content .email {
      font-size: 12px;
      color: gray;
      margin-left: 5px;
    }

    .comment-content .timestamp {
      font-size: 12px;
      color: gray;
      margin-top: 5px;
    }

    .input-container {
      display: flex;
      flex-direction: column;
      padding: 10px;
      background-color: #fff;
      border-top: 1px solid #ccc;
    }

    .input-container input {
      margin: 5px 0;
      padding: 10px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .input-container button {
      padding: 10px 15px;
      font-size: 16px;
      background-color: hsl(24.2,95.3%,58.2%);
      color: white;
      border: none;
      border-radius: 5px;
      margin-top: 5px;
      cursor: pointer;
    }

    .input-container button:hover {
      background-color: hsl(24.2,85.3%,48.2%);
    }
  </style>
</head>
<body>
  <div class="comment-container" id="commentContainer">
    <?php foreach ($comments as $comment): ?>
      <div class="comment">
        <ion-icon name="person-circle-outline"></ion-icon>
        <div class="comment-content">
          <div class="name">
            <?= $comment['name'] ?> <span class="email">(<?= $comment['email'] ?? 'unknown@example.com' ?>)</span>
          </div>
          <div><?= $comment['message'] ?></div>
          <div class="timestamp">Posted on: <?= $comment['timestamp'] ?? 'Unknown time' ?></div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <div class="input-container">
    <form method="POST" action="">
      <input type="text" name="name" placeholder="Your Name" required>
      <input type="text" name="message" placeholder="Your Comment" required>
      <button type="submit">Comment</button>
    </form>
  </div>
</body>
</html>
