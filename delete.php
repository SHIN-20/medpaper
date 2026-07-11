<?php
require 'functions.php';

$id = (int)($_GET['id'] ?? 0);
if ($id > 0) {
    $stmt = db()->prepare('DELETE FROM papers WHERE id = ?');
    $stmt->execute([$id]);
}

header('Location: select.php');
exit;
