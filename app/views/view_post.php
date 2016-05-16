<section class="post">
	<header>
		<h5>
			<a href="#!">
				<img src="<?=$post['avatar']?>" />
				<?=$post['username']?>
			</a>
			<span class="pull-right"><?=$this->ago(strtotime($post['date']))?></span>
			<a href="<?=SITE_URL?>/?route=user/deletePost&id=<?=htmlentities($post['post_id'])?>" class="pull-right">foto verwijderen?</a>
		</h5>
	</header>

	<div class="image" style="background-image:url('<?=$post['image_url']?>')"></div><!-- ./image -->
	
	<div class="bottom">
		<div class="likes">
			<ul>
				<?php if( !empty($post['likes']) ): ?>
						<?php foreach($post['likes'] as $like): ?>
							<li>
								<a href="#!"><?= $like['username'] ?></strong> <?= $this->linkHashtags($like['like']); ?>
							</li>
						<?php endforeach; ?>
				<?php endif; ?>
			</ul>
		</div><!-- ./likes -->

		<div class="reacties">
			<p class="poster">
				<?=$this->linkHashtags($post['description'])?>
			</p>
			<hr>
			<ul>
				<?php if( !empty($post['comments']) ): ?>
						<?php foreach($post['comments'] as $comment): ?>
							<li>
								<strong><?= $comment['username'] ?></strong> <?= $this->linkHashtags($comment['comment']); ?>
							</li>
						<?php endforeach; ?>
				<?php endif; ?>
			</ul>
		</div><!-- ./reacties -->
		<div class="reageren">
			<a href="<?=SITE_URL?>/?route=post/like&id=<?=htmlentities($post['post_id'])?>"><i class="fa fa-heart-o"></i></a>
			<form action="<?=SITE_URL?>/?route=post/comment" method="post">
			<input type="hidden" value="<?=$post['post_id']?>" name="post_id">
			<input type="text" class="reactie-plaatsen" name="comment" placeholder="Schrijf een reactie..." />
			<input type="submit" value="Post !">
			</form>
		</div><!-- ./reageren -->
	</div><!-- ./bottom -->
</section><!-- ./post -->