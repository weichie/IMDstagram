<section class="acc-details">
	<div class="col-xs-12 col-sm-4 pic">
		<div class="img" style="background:url('<?=(!isset($bio['avatar'])) ? 'https://cdn1.iconfinder.com/data/icons/user-pictures/100/unknown-512.png':$bio['avatar']?>') no-repeat;"></div>
	</div><!-- ./picture -->
	<?php if( !$this->isPrivate($bio['id']) ): ?>
	<div class="col-xs-12 col-sm-8 bio">
		<h4><?=htmlentities($bio['username'])?> 

		<?php if( $bio['id'] == $this->getUserID()) : ?>
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
	<?php else: ?>
	<div class="col-xs-12 col-sm-8 bio">
		<h4><?=htmlentities($bio['username'])?> 

		<?php if( $bio['id'] == $this->getUserID()) : ?>
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
				<a href="<?=SITE_URL?>/?route=user/view_post&id=<?=$post['id']?>">
					<figure class="<?=$post['filter']?>">
					<img src="<?=$post['image_url']?>" alt="" />
					</figure>
				</a>
			</li>
			<?php endforeach; ?>
			
			<?php endif; ?>
		<?php endif; ?>
	</ul>
</section>