<?php
include 'ayar.php';
include 'func.php';
   
$sorgu=$db->prepare(query:"select * from hakkımızda");
$sorgu->execute();
$sonuc=$sorgu->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$sor["hak_title"]; ?></title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <header class="container">
        <div class="row">
            <div class="col-lg-6">
                <a href="index.php" class="logo"><strong>Blog Tasarımı</strong></a>
            </div>
            <div class="col-lg-6 text-right">
                <a href="index.php" class="menu">Anasayfa</a>
                <a href="" class="menu">Hakkımızda</a>
                <a href="index.php" class="menu">Blog</a>
            </div>
        </div>
    </header>
    
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mt-5 mb-5">
                
            <div class="col-lg-12 text-center mt-5 mb-5">
                <h1><strong><?=$sonuc["hak_title"]?></strong></h1>
                <p><?=$sonuc["hak_aciklama"]?> </p>
            </div>
            </div>
        </div>
    </div>
    
</body>
</html>