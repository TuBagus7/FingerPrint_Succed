<div class="popup-wrapper" id="popup">
<div class="popup-container">
<h1>HAPUS</h1>
<p style="font-size:19px;">Apakah anda ingin hapus data ini..?</p>

<a href="<?php index(); ?>">
<?php btn_tidak('NO'); ?>
</a>

<a href="proses_hapus.php?proses=<?php echo decrypt(mysql_real_escape_string($_GET['proses']));?>">
<?php btn_ya('YES'); ?>
</a>

<a class="popup-close" href="<?php index(); ?>">X</a>
</div>
</div>
