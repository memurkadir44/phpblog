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
    <title>Blog Tasarımı</title>
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
                <a href="" class="logo"><strong>Yönetici Paneli</strong></a>
            </div>
            <div class="col-lg-12 text-right">
                <a href="index.php" class="menu">Siteyi Görüntüle</a>
                <a href="admin.php" class="menu">Yazılar</a>
                <a href="yaziekle.php" class="menu">Yazı Ekle</a>
                <a href="anasayfupdate.php" class="menu">Anasayfa  Güncelle</a>
                
                <a href="hakkımızdaupdate.php" class="menu">Hakkımızda Güncelle</a>
                <a href="admncikis.php" onclick="if (!confirm('Çıkış Yapmak İstediğinize Emin misiniz?')) return false;">ÇIKIŞ</a>
            </div>
        </div>
    </header>
    
    <div class="container">
            <div class="row mt-4">
                <div class="col">
                    <table class="table table-hover table-dark table-striped">
                        <thead>
                            <tr>
                                <th>Başlık</th>
                                <th>Açıklama</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?=$sonuc["hak_title"]?></td>
                                <td><?=$sonuc["hak_aciklama"]?></td>
                            <td>
                                    <div class="btn-group">
                                        
                                        <a href="hakkımızdaedit.php?id=<?=$sonuc['id']?>" class="btn btn-success">Güncelle</a>
                                        
                                    </div>
                            </tr>
                   
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    
    
</body>
</html>