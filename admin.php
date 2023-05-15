<?php
session_start();
    include 'ayar.php';
    include("ayarvtb2.php");
    if(isset($_GET['sil'])){
        $sqlsil="DELETE FROM yazilar WHERE `yazilar`.`yazi_id` = ?";
        $veri = $baglan->prepare($sqlsil);
        $veri->execute(
            [$_GET['sil']]
        );
        header('Location:admin.php');
    }
    if ($_SESSION["giris"] != sha1(md5("var")) || $_COOKIE["kullanici"] != "msb") {
        header("Location:admncikis.php");
    }

    $veri="SELECT * FROM yazilar";
    $veri = $db->prepare($veri);
    $veri->execute();
    
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
        <div class="row" >
            <div class="col-lg-6"  >
                <a href="" class="logo"><strong>Yönetici Paneli</strong></a>
            </div>
            <div class="col-lg-12 text-right " >
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
                                <th>id</th>
                                <th>Yazı Adı</th>
                                <th>Açıklama</th>
                                <th>İşlem</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php while($satir = $veri->fetch(PDO::FETCH_ASSOC)) { ?>
                            <tr>
                                <td><?=$satir['yazi_id']?></td>
                                <td><?=$satir['yazi_baslik']?></td>
                                <td><?=$satir['yazi_aciklama']?></td>
                                <td>
                                    <div class="btn-group">
                                        
                                        <a href="guncelle.php?yazi_id=<?=$satir['yazi_id']?>" class="btn btn-secondary">Güncelle</a>
                                        <a href="?sil=<?=$satir['yazi_id']?>" onclick="return confirm('Silinsin mi?')" class="btn btn-danger">Kaldır</a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    
    
</body>
</html>