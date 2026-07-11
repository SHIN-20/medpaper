<?php

require 'functions.php';

$id = (int)($_GET['id'] ?? 0);
$stmt = db()->prepare('SELECT * FROM papers WHERE id = ?');
$stmt->execute([$id]);
$p = $stmt->fetch();

if (!$p) {                      
    header('Location: select.php');
    exit;
}
?>
<!doctype html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>論文の詳細・編集</title>
<style>
  body { font-family: sans-serif; max-width: 600px; margin: 30px auto; padding: 0 15px; }
  label { display: block; margin-top: 12px; font-weight: bold; }
  input, textarea { width: 100%; padding: 8px; box-sizing: border-box; }
  button { margin-top: 16px; padding: 10px 24px; }
  .date { color: #888; }
</style>
</head>
<body>
  <h1>🔍 論文の詳細・編集</h1>
  <p><a href="select.php">→ 一覧へ戻る</a></p>
  <p class="date">登録日時: <?= h($p['created_at']) ?></p>

  <form action="update.php" method="post">
    <input type="hidden" name="id" value="<?= (int)$p['id'] ?>">

    <label>タイトル（必須）</label>
    <input name="title" value="<?= h($p['title']) ?>" required>

    <label>著者</label>
    <input name="authors" value="<?= h($p['authors']) ?>">

    <label>掲載誌</label>
    <input name="journal" value="<?= h($p['journal']) ?>">

    <label>発行年</label>
    <input name="pub_year" value="<?= h($p['pub_year']) ?>">

    <label>URL</label>
    <input name="url" value="<?= h($p['url']) ?>">
    <?php if ($p['url']): ?>
      <a href="<?= h($p['url']) ?>" target="_blank">→ 論文ページを開く</a>
    <?php endif; ?>

    <label>メモ</label>
    <textarea name="memo" rows="4"><?= h($p['memo']) ?></textarea>

    <button type="submit">更新する</button>
    <a href="delete.php?id=<?= (int)$p['id'] ?>"
       onclick="return confirm('削除しますか？')">この論文を削除</a>
  </form>
</body>
</html>
