
<?php if( !isset($picture) ): ?>
<h3>Klik op de plus om een foto toe te voegen :D</h3>
<?php else: ?>
<h3>Voeg een beschrijving en een filter toe aan je foto</h3>
<?php endif; ?>

<div class="img-placeholder">
<?php if( !isset($picture) ): ?>
<form class="post_img_form" method="post" action="<?=SITE_URL?>/?route=user/do_upload" enctype="multipart/form-data">
<?php else: ?>
<form class="post_img_form" method="post" action="<?=SITE_URL?>/?route=user/post" enctype="multipart/form-data">
<?php endif; ?>

<?php if( !isset($picture) ): ?>
<i class="fa fa-plus-circle"></i>
<input type="file" name="userfile_post" size="25" style="position: absolute; left: -5000px;" />
<input type="hidden" name="type" value="post">
<?php else: ?>

<figure id="baseImage" style="max-width:200px">
<img src="<?=$picture?>" style="max-width:200px">
</figure>

<?php endif; ?>

<?php if( isset($id) ): ?>
<input type="hidden" value="<?=$id?>" name="post_id">
<?php endif; ?>

<?php if( isset($picture) ): ?>
<h4>Selecteer een filter</h4>

<p>
	<?php
	foreach( array('nofilter', 'rise', 'mayfair', 'inkwell', 'earlybird','_1977','aden') as $id => $filter ):
	?>
	
	<figure class="<?=$filter?>" style="display: inline-block; text-align: center;">
	<img src="<?=$picture?>" class="smallImage" style="max-width:100px">
	<br>
	<input type="radio" <?=($id==0)?'checked="checked"':'';?> name="filter" value="<?=$filter?>">
	</figure>
	<?php endforeach; ?>
</p>
<?php endif; ?>

<textarea name="beschrijving" placeholder="Vertel wat meer over je foto"></textarea>
<br>

<button class="post_img_button" type="submit"> Afbeelding plaatsen </button>
</form>