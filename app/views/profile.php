<section class="acc-details">
	<div class="col-xs-12 col-sm-4 pic">
		<div class="img" style="background:url('<?=(!isset($bio['avatar'])) ? 'https://cdn1.iconfinder.com/data/icons/user-pictures/100/unknown-512.png':$bio['avatar']?>') no-repeat;"></div>
	</div><!-- ./picture -->
	<?php if( !$this->isPrivate($bio['id']) ): ?>
	<div class="col-xs-12 col-sm-8 bio">
		<h4><?php htmlspecialchars($bio['username'], ENT_QUOTES, 'UTF-8'); ?>

		<?php if( htmlspecialchars($bio['id'], ENT_QUOTES, 'UTF-8') == $this->getUserID()) : ?>
		<a href="<?=SITE_URL?>/?route=user/edit_profile">Bewerken</a>
		<?php else: ?>
			
			<?php
			if( $this->isFollowing($bio['id'], true) ):
			?>
			<a href="<?=SITE_URL?>/?route=user/unfollow&id=<?=htmlentities($bio['id'])?>" class="btn btn-danger">Volg jij</a>
			<?php endif; ?>
			<?php
			if( !$this->isFollowing($bio['id'], true) && $this->isFollowing($bio['id']) ):
			?>
			<a href="">Aanvraag ingediend</a>
			<?php endif; ?>
			<?php
			if( !$this->isFollowing($bio['id']) ):
			?>
			<a href="<?=SITE_URL?>/?route=user/follow&id=<?=htmlentities($bio['id'])?>">Volgen</a>
			<?php endif; ?>

		<?php endif; ?>
		</h4>
		<p>
			<strong><?php htmlspecialchars($bio['name'], ENT_QUOTES, 'UTF-8'); ?></strong> <?php htmlspecialchars($bio['bio'], ENT_QUOTES, 'UTF-8'); ?>
			<br>
			<a href="<?php htmlspecialchars($bio['url'], ENT_QUOTES, 'UTF-8'); ?>"><?php htmlspecialchars($bio['url'], ENT_QUOTES, 'UTF-8'); ?></a>
		</p>
		<ul>
			<li><strong><?php htmlspecialchars($total_posts, ENT_QUOTES, 'UTF-8'); ?></strong> berichten</li>
			<li><strong><?php htmlspecialchars($followers, ENT_QUOTES, 'UTF-8'); ?></strong> volgers</li>
			<li><strong><?php htmlspecialchars($following, ENT_QUOTES, 'UTF-8'); ?></strong> volgend</li>
		</ul>
	</div><!-- ./bio -->
	<?php else: ?>
	<div class="col-xs-12 col-sm-8 bio">
		<h4><?php htmlspecialchars($bio['username'], ENT_QUOTES, 'UTF-8'); ?> 

		<?php if( $bio['id'] == $this->getUserID()) : ?>
		<a href="<?=SITE_URL?>/?route=user/edit_profile">Bewerken</a>
		<?php else: ?>
			
			<?php
			if( $this->isFollowing($bio['id'], true) ):
			?>
			<a href="<?=SITE_URL?>/?route=user/unfollow&id=<?php htmlspecialchars($bio['id'], ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-danger">Volg jij</a>
			<?php endif; ?>
			<?php
			if( !$this->isFollowing($bio['id'], true) && $this->isFollowing($bio['id']) ):
			?>
			<a href="">Aanvraag ingediend</a>
			<?php endif; ?>
			<?php
			if( !$this->isFollowing($bio['id']) ):
			?>
			<a href="<?=SITE_URL?>/?route=user/follow&id=<?php htmlspecialchars($bio['id'], ENT_QUOTES, 'UTF-8'); ?>">Volgen</a>
			<?php endif; ?>

		<?php endif; ?>
		</h4>
		<p>Dit account is privé
		</p>
	</div><!-- ./bio -->
	<?php endif; ?>
	<div class="clearfix"></div>
</section><!-- ./acc-details -->

<section class="acc-uploads">
	<ul>
		<?php if( !$this->isPrivate($bio['id']) ): ?>
			<?php
			if( empty($posts) ):
			?>

			<?php else: ?>

			<?php foreach($posts as $post): ?>
			<li>
				<a href="<?=SITE_URL?>/?route=user/view_post&id=<?php htmlspecialchars($post['id'], ENT_QUOTES, 'UTF-8'); ?>">
					<figure class="<?php htmlspecialchars($post['filter'], ENT_QUOTES, 'UTF-8'); ?>">
					<img src="<?php htmlspecialchars($post['image_url'], ENT_QUOTES, 'UTF-8'); ?>" alt="" />
					</figure>
				</a>
			</li>
			<?php endforeach; ?>
			
			<?php endif; ?>
		<?php endif; ?>
	</ul>
</section>