<?php if( isset($update_message) ): ?>
<div class="alert alert-warning">
	<?= $update_message ?>	
</div>
<?php endif; ?>

<section class="acc-details">
	<div class="col-xs-12 col-sm-4 pic">
		
		<?php if( !$bio['avatar'] ): ?>
		Upload een Avatar.
		<form method="post" action="<?=SITE_URL?>/?route=user/do_upload" enctype="multipart/form-data">
		<input type="file" name="user_avatar">
		<input type="submit" "Uploaden">
		</form>
		<?php else: ?>
		<img src="<?=$bio['avatar']?>">
		<p><a href="#!">Avatar aanpassen?</a>
		<form method="post" action="<?=SITE_URL?>/?route=user/do_upload" enctype="multipart/form-data">
		<input type="file" name="user_avatar">
		<input type="submit" "Uploaden">
		</form>
		<?php endif; ?>

	</div><!-- ./picture -->
	<div class="col-xs-12 col-sm-8 bio">
		<h4><?=htmlentities($bio['username'])?><a href="?p=profile">annuleren</a></h4>
		<p>
			<strong><?=htmlentities($bio['name'])?></strong> <?=htmlentities($bio['bio'])?>
			<br>
			<a href="<?=htmlentities($bio['url'])?>"><?=htmlentities($bio['url'])?></a>
		</p>
		<ul>
			<li><strong><?=$total_posts?></strong> berichten</li>
			<li><strong><?=$followers?></strong> volgers</li>
			<li><strong><?=$following?></strong> volgend</li>
		</ul>
	</div><!-- ./bio -->
	<div class="clearfix"></div>
</section><!-- ./acc-details -->
<section class="acc-update">
	<form class="form-horizontal" action="" method="post">
		<div class="form-group">
			<label for="email" class="col-sm-2 control-label">Email</label>
			<div class="col-sm-10">
				<input type="email" class="form-control" name="email" id="email" value="<?=htmlentities($bio['email'])?>">
			</div>
		</div>
		<div class="form-group">
			<label for="name" class="col-sm-2 control-label">Naam</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="name" id="name" value="<?=htmlentities($bio['name'])?>">
			</div>
		</div>
		<div class="form-group">
			<label for="username" class="col-sm-2 control-label">gebruikersnaam</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="username" id="username" value="<?=htmlentities($bio['username'])?>">
			</div>
		</div>
		<div class="form-group">
			<label for="site" class="col-sm-2 control-label">Website</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="site" id="site" value="<?=htmlentities($bio['url'])?>">
			</div>
		</div>
		<div class="form-group">
			<label for="bio" class="col-sm-2 control-label">Bio</label>
			<div class="col-sm-10">
				<textarea type="text" rows="5" class="form-control" name="bio" id="bio"><?=htmlentities($bio['bio'])?></textarea>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" name="update" class="btn btn-success">opslaan</button>
			</div>
		</div>
	</form>
</section>