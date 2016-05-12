<h3>Klik op de plus om een foto toe te voegen :D</h3><div class="img-placeholder">
<form class="post_img_form" method="post" action="<?=SITE_URL?>/?p=do_upload" enctype="multipart/form-data">
<i class="fa fa-plus-circle"></i>

<input type="file" name="userfile_post" size="25" style="position: absolute; left: -5000px;" />
<input type="hidden" name="type" value="post">
<h4>Selecteer een filter</h4>

<p> hier stuff voor filter </p>

<textarea name="beschrijving" placeholder="Vertel wat meer over je foto"></textarea>
<br>
<button class="post_img_button" type="submit"> Afbeelding posten </button>
</form>