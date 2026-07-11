<?php
require 'functions.php';

$q = trim($_GET['q'] ?? '');
if ($q !== '') {
    $stmt = db()->prepare(
        'SELECT * FROM papers
         WHERE title LIKE ? OR authors LIKE ? OR memo LIKE ?
         ORDER BY id DESC'
    );
    $like = "%$q%";
    $stmt->execute([$like, $like, $like]);
} else {
    $stmt = db()->query('SELECT * FROM papers ORDER BY id DESC');
}
$papers = $stmt->fetchAll();
?>
<!doctype html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>論文の一覧</title>
<style>
  body { font-family: sans-serif; max-width: 800px; margin: 30px auto; padding: 0 15px; }
  table { border-collapse: collapse; width: 100%; }
  th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
  th { background: #f0f4ff; }
  form.search { margin-bottom: 16px; }
  input[name=q] { padding: 8px; width: 300px; }
</style>
</head>
<body>
  <h1>📚 論文の一覧</h1>
  <p><a href="index.php">→ 新しく登録する</a></p>

  <form class="search" action="select.php" method="get">
    <input name="q" value="<?= h($q) ?>" placeholder="タイトル・著者・メモで検索">
    <button type="submit">検索</button>
    <?php if ($q !== ''): ?><a href="select.php">解除</a><?php endif; ?>
  </form>

  <?php if (!$papers): ?>
    <p>データがありません。</p>
  <?php else: ?>
  <table>
    <tr><th>タイトル</th><th>著者</th><th>発行年</th><th>操作</th></tr>
    <?php foreach ($papers as $p): ?>
    <tr>
      <td><?= h($p['title']) ?></td>
      <td><?= h($p['authors']) ?></td>
      <td><?= h($p['pub_year']) ?></td>
      <td>
        <a href="detail.php?id=<?= (int)$p['id'] ?>">詳細</a>
        <a href="delete.php?id=<?= (int)$p['id'] ?>"
           onclick="return confirm('削除しますか？')">削除</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </table>
  <?php endif; ?>
</body>
</html>
