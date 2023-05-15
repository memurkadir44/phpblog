 
<?php
 include("ayar.php");
 include("ayarvtb2.php");
 include("baglan.php");
  
 if(isset($_POST['guncelle'])){
  
     $sql = "
     UPDATE `yazilar` SET `yazi_baslik` = ?, `yazi_aciklama` = ?, `yazi_resim` = ? WHERE `yazilar`.`yazi_id` = ?";
     $dizi=[
         $_POST['yazi_baslik'],
        
         $_POST['yazi_aciklama'],
          $_POST['yazi_resim'],
          $_POST['yazi_id']
        
     ];
     $sorgu = $db->prepare($sql);
     $sorgu->execute($dizi);
  
     header("Location:admin.php");
 }
  
 $sql ="SELECT * FROM yazilar WHERE yazi_id = ?";
 $sorgu = $baglan->prepare($sql);
 $sorgu->execute([
     $_GET['yazi_id']
 ]);
 $satir = $sorgu->fetch(PDO::FETCH_ASSOC);

 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Kadirin Paylasımları</title>
     <!-- CSS only -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
 </head>
 <body>
     
   
     </header>
     <main>
     <div class="container">
         <form action="" method="post" class="row mt-4 g-3">
             <input type="hidden" name="yazi_id" value="<?=$satir['yazi_id']?>">
             <div class="col-6">
                 <label for="yazi_baslik" class="form-label">Başlık</label>
                 <input type="text" class="form-control" name="yazi_baslik" value="<?=$satir['yazi_baslik']?>">
             </div>
             <div class="col-6">
                 <label for="yazi_aciklama" class="form-label">Açıklama</label>
                 <input type="text" class="form-control" name="yazi_aciklama" value="<?=$satir['yazi_aciklama']?>">
             </div>
             <div class="col-6">
                 <label for="yazi_resim" class="form-label">resim adresi</label>
                 <input type="text" class="form-control" name="yazi_resim" value="<?=$satir['yazi_resim']?>">
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