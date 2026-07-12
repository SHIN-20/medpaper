<?php require 'functions.php'; ?>
<!doctype html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>論文の登録</title>
<style>
  body { font-family: sans-serif; max-width: 600px; margin: 30px auto; padding: 0 15px; }
  label { display: block; margin-top: 12px; font-weight: bold; }
  input, textarea { width: 100%; padding: 8px; box-sizing: border-box; }
  button { margin-top: 16px; padding: 10px 24px; }
</style>
</head>
<body>
  <h1>論文の登録</h1>
  <p><a href="select.php">→ 一覧を見る</a></p>

  <form action="insert.php" method="post">
    <label>タイトル（必須）</label>
    <input name="title" required>

    <label>著者</label>
    <input name="authors">

    <label>掲載誌</label>
    <input name="journal">

    <label>発行年</label>
    <input name="pub_year">

    <label>URL</label>
    <input name="url">

    <label>メモ</label>
    <textarea name="memo" rows="4"></textarea>

    <button type="submit">登録する</button>
  </form>
</body>
</html>
