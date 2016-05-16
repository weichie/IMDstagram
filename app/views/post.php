
<?php if( !isset($picture) ): ?>
<h3>Selecteer een foto</h3>
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
	<span class="upload-btn"><i class="fa fa-plus-circle"></i> Selecteer een foto</span>
	<input type="file" name="userfile_post" size="25" style="position: absolute; left: -5000px;" />
	<input type="hidden" name="type" value="post">
	
	<button class="post_img_button" type="submit"> Uploaden </button>
<?php else: ?>

<figure id="baseImage" style="max-width:200px">
	<img src="<?php htmlspecialchars($picture, ENT_QUOTES, 'UTF-8'); ?>" style="max-width:200px">
</figure>

<?php endif; ?>

<?php if( isset($id) ): ?>
	<input type="hidden" value="<?php htmlspecialchars($id, ENT_QUOTES, 'UTF-8'); ?>" name="post_id">
<?php endif; ?>

<?php if( isset($picture) ): ?>
<h4>Selecteer een filter</h4>

<ul class="select-filter">
	<?php
	foreach( array('nofilter', 'rise', 'mayfair', 'xpro2', 'inkwell', 'earlybird','_1977','aden') as $id => $filter ):
	?>
	<li>
		<figure class="<?php htmlspecialchars($filter, ENT_QUOTES, 'UTF-8'); ?>">
			<img src="<?php htmlspecialchars($picture, ENT_QUOTES, 'UTF-8'); ?>" class="smallImage"><br>
			<input type="radio" <?=($id==0)?'checked="checked"':'';?> name="filter" value="<?php htmlspecialchars($filter, ENT_QUOTES, 'UTF-8'); ?>">
		</figure>
	</li>
	<?php endforeach; ?>
</ul>

<textarea name="beschrijving" class="upload-txt" rows="5" placeholder="Vertel wat meer over je foto"></textarea>
<br>
<button class="post_img_button" type="submit"> Afbeelding plaatsen </button>
<?php endif; ?>


</form>