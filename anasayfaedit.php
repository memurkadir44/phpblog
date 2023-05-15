 
<?php
 include("ayar.php");
 include("ayarvtb2.php");
 include("baglan.php");
 
 if(isset($_POST['guncelle'])){
  
    $sql = "
    UPDATE `anasayfa` SET `üstBaslik` = ?, `altBaslik` = ? WHERE `anasayfa`.`id` = ?";
    $dizi=[
        $_POST['üstBaslik'],
       
        $_POST['altBaslik'],
         $_POST['id']
       
    ];
    $sorgu = $baglan->prepare($sql);
    $sorgu->execute($dizi);
 
    header("Location:anasayfupdate.php");
}

$sorgu=$db->prepare(query:"select * from anasayfa where id=:id");
 $sorgu->execute(['id' =>(int)$_GET["id"]]);
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
            <div class="col-lg-6 text-right">
                <a href="index.php" class="menu">Siteyi Görüntüle</a>
                <a href="admin.php" class="menu">Yazılar</a>
                <a href="yaziekle.php" class="menu">Yazı Ekle</a>
                <a href="anasayfupdate.php" class="menu">Anasayfa  Güncelle</a>
                <a href="admncikis.php" onclick="if (!confirm('Çıkış Yapmak İstediğinize Emin misiniz?')) return false;">ÇIKIŞ</a>
            </div>
        </div>
    </header>
    
     
   
     </header>
     <main>
     <div class="container">
         <form action="" method="post" class="row mt-4 g-3">
             <input type="hidden" name="id" value="<?=$sonuc['id']?>">
             <div class="col-6">
                 <label for="üstBaslik" class="form-label">Başlık</label>
                 <input type="text" class="form-control" name="üstBaslik" value="<?=$sonuc['üstBaslik']?>">
             </div>
             <div class="col-6">
                 <label for="altBaslik" class="form-label">Alt Başlık</label>
                 <input type="text" class="form-control" name="altBaslik" value="<?=$sonuc['altBaslik']?>">
             </div>
             
             <div class="col-8">
             <button type="submit" name="guncelle" class="btn btn-primary">Güncelle</button>
             </div> 
             
         </form>
     </div>
     </main>
     <footer></footer>
 </body>
 </html>