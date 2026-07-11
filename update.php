<?php
require 'functions.php';

$id    = (int)($_POST['id'] ?? 0);
$title = trim($_POST['title'] ?? '');

if ($id > 0 && $title !== '') {
    $stmt = db()->prepare(
        'UPDATE papers
         SET title = ?, authors = ?, journal = ?, pub_year = ?, url = ?, memo = ?
         WHERE id = ?'
    );
    $stmt->execute([
        $title,
        $_POST['authors']  ?? '',
        $_POST['journal']  ?? '',
        $_POST['pub_year'] ?? '',
        $_POST['url']      ?? '',
        $_POST['memo']     ?? '',
        $id,
    ]);
}

header('Location: select.php');
exit;
