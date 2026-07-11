<?php
require 'functions.php';

$title = trim($_POST['title'] ?? '');
if ($title === '') {           
    header('Location: index.php');
    exit;
}

$stmt = db()->prepare(
    'INSERT INTO papers (title, authors, journal, pub_year, url, memo)
     VALUES (?, ?, ?, ?, ?, ?)'
);
$stmt->execute([
    $title,
    $_POST['authors']  ?? '',
    $_POST['journal']  ?? '',
    $_POST['pub_year'] ?? '',
    $_POST['url']      ?? '',
    $_POST['memo']     ?? '',
]);

header('Location: select.php');
exit;
