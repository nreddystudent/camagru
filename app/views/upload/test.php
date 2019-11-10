<?php
    $path = ROOT."/images/tenor.gif";
    $img = imagecreatefromgif($path);
    $imgRot = gifro($img, 270, 0);
    imagegif($imgRot, ROOT."/images/tenorr.gif", -1);
?>

<img src="<?=PROOT?>images/tenor.gif" alt="i am here">
<img src="<?=PROOT?>images/tenorr.gif" alt="i am here">