<?php if( isset($update_message) ): ?>
<div class="alert alert-warning">
	<?php echo htmlspecialchars($update_message, ENT_QUOTES, 'UTF-8');?>	
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
		<div class="img" style="background:url('<?=$bio['avatar']?>')no-repeat;"></div>
		<p><a href="#!">Avatar aanpassen?</a>
		<!-- 
		<form method="post" action="<?=SITE_URL?>/?route=user/do_upload" enctype="multipart/form-data">
		<input type="file" name="user_avatar">
		<input type="submit" "Uploaden">
		</form>
	-->
		<?php endif; ?>

	</div><!-- ./picture -->
	<div class="col-xs-12 col-sm-8 bio">
		<h4><?php echo htmlspecialchars($bio['username'], ENT_QUOTES, 'UTF-8'); ?><a href="?p=profile">annuleren</a></h4>
		<p>
			<strong><?php echo htmlspecialchars($bio['name'], ENT_QUOTES, 'UTF-8'); ?></strong> <?php echo htmlspecialchars($bio['bio'], ENT_QUOTES, 'UTF-8'); ?>
			<br>
			<a href="<?php echo htmlspecialchars($bio['url'], ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($bio['url'], ENT_QUOTES, 'UTF-8'); ?></a>
		</p>
		<ul>
			<li><strong><?php echo htmlspecialchars($total_posts, ENT_QUOTES, 'UTF-8'); ?></strong> berichten</li>
			<li><strong><?php echo htmlspecialchars($followers, ENT_QUOTES, 'UTF-8'); ?></strong> volgers</li>
			<li><strong><?php echo htmlspecialchars($following, ENT_QUOTES, 'UTF-8'); ?></strong> volgend</li>
		</ul>
	</div><!-- ./bio -->
	<div class="clearfix"></div>
</section><!-- ./acc-details -->
<section class="acc-update">
	<form class="form-horizontal" action="" method="post">
		<div class="form-group">
			<label for="email" class="col-sm-2 control-label">Email</label>
			<div class="col-sm-10">
				<input type="email" class="form-control" name="email" id="email" value="<?php echo htmlspecialchars($bio['email'], ENT_QUOTES, 'UTF-8'); ?>">
			</div>
		</div>
		<div class="form-group">
			<label for="name" class="col-sm-2 control-label">Naam</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="name" id="name" value="<?php echo htmlspecialchars($bio['name'], ENT_QUOTES, 'UTF-8'); ?>">
			</div>
		</div>
		<div class="form-group">
			<label for="username" class="col-sm-2 control-label">gebruikersnaam</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="username" id="username" value="<?php echo htmlspecialchars($bio['username'], ENT_QUOTES, 'UTF-8'); ?>">
			</div>
		</div>
		<div class="form-group">
			<label for="site" class="col-sm-2 control-label">Website</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="site" id="site" value="<?php echo htmlspecialchars($bio['url'], ENT_QUOTES, 'UTF-8'); ?>">
			</div>
		</div>
		<div class="form-group">
			<label for="bio" class="col-sm-2 control-label">Bio</label>
			<div class="col-sm-10">
				<textarea type="text" rows="5" class="form-control" name="bio" id="bio"><?php echo htmlspecialchars($bio['bio'], ENT_QUOTES, 'UTF-8'); ?></textarea>
			</div>
		</div>
		<div class="form-group">
			<label for="bio" class="col-sm-2 control-label">Account is privé?</label>
			<div class="col-sm-10">
				<input type="checkbox" name="private" value="1" <?=($bio['private']) ? 'checked="checked"' : ''?>>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" name="update" class="btn btn-success">opslaan</button>
			</div>
		</div>

	</form>
</section>