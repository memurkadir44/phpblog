 
<?php

$dsn = 'mysql:dbname=phpblog;host=127.0.0.1';
$user = 'kdrmmr';
$password = '1234';
 
try {
    $baglan = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Bağlantı kurulamadı: ' . $e->getMessage();
}
 
?>