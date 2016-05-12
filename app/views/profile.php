<section class="acc-details">
	<div class="col-xs-12 col-sm-4 pic">
		<img src="<?=$bio['avatar']?>">
	</div><!-- ./picture -->
	<div class="col-xs-12 col-sm-8 bio">
		<h4><?=htmlentities($bio['username'])?> 

		<?php if( $bio['id']== $this->getUserID()) : ?>
		<a href="<?=SITE_URL?>/?route=user/edit_profile">Bewerken</a>
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
	<div class="clearfix"></div>
</section><!-- ./acc-details -->

<section class="acc-uploads">
	<ul>
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
	</ul>
</section>