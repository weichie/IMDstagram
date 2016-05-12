
<?php if( !isset($picture) ): ?>
<h3>Klik op de plus om een foto toe te voegen :D</h3>
<?php else: ?>
<h3>Voeg een beschrijving en een filter toe aan je foto</h3>
<?php endif; ?>

<div class="img-placeholder">
<?php if( !isset($picture) ): ?>
<form class="post_img_form" method="post" action="<?=SITE_URL?>/?route=user/do_upload" enctype="multipart/form-data">
<?php else: ?>
<form class="post_img_form" method="post" action="<?=SITE_URL?>/?route=user/post_image" enctype="multipart/form-data">
<?php endif; ?>

<?php if( !isset($picture) ): ?>
<i class="fa fa-plus-circle"></i>
<input type="file" name="userfile_post" size="25" style="position: absolute; left: -5000px;" />
<input type="hidden" name="type" value="post">
<?php endif; ?>

<img src="<?=$picture?>" style="max-width:200px">

<h4>Selecteer een filter</h4>

<p> hier stuff voor filter </p>

<textarea name="beschrijving" placeholder="Vertel wat meer over je foto"></textarea>
<br>

<button class="post_img_button" type="submit"> Afbeelding posten </button>
</form>