<?php
function db(): PDO
{
    $host = 'localhost';   
    $name = 'medpaper';    
    $user = 'root';        
    $pass = '';            

    $pdo = new PDO("mysql:host=$host;dbname=$name;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
}


function h($s): string
{
    return htmlspecialchars($s ?? '', ENT_QUOTES, 'UTF-8');
}
