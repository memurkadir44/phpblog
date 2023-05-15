<?php

if(isset($_GET["yazi_id"])){
    include 'ayar.php';
    include("ayarvtb2.php");
   
    $sqlsil="DELETE FROM yazilar WHERE `yazilar`.`yazi_id` = ?";
    $veri = $db->prepare($sqlsil);
    $sonuc=$veri->execute(
        [$row["yazi_tarih"]]
    );
    if ($sonuc) {
        header("Location:admin.php");
    }
    else
    echo ("kayıt silinemdi.");

}
?>
