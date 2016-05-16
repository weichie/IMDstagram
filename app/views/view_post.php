<section class="post">
	<header>
		<h5>
			<a href="#!">
				<img src="<?php echo htmlspecialchars($post['avatar'], ENT_QUOTES, 'UTF-8'); ?>" />
				<?php echo htmlspecialchars($post['username'], ENT_QUOTES, 'UTF-8'); ?>
			</a>
			<span class="pull-right"><?=$this->ago(strtotime($post['date']))?></span>
			<a href="<?=SITE_URL?>/?route=user/deletePost&id=<?php echo htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8'); ?>" class="pull-right">foto verwijderen?</a>
		</h5>
	</header>
	
	<figure class="<?php echo htmlspecialchars($post['filter'], ENT_QUOTES, 'UTF-8'); ?>">
	<div class="image" style="background-image:url('<?=$post['image_url']?>')"></div><!-- ./image -->
	</figure>

	<div class="bottom">
		<div class="likes">
			<ul>
				<?php if( !empty($post['likes']) ): ?>
						<?php foreach($post['likes'] as $like): ?>
							<li>
								<a href="#!"><?php echo htmlspecialchars($like['username'], ENT_QUOTES, 'UTF-8'); ?></strong> <?= $this->linkHashtags($like['like']); ?>
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
			<ul class="comments_<?=$post['post_id']?>">
				<?php if( !empty($post['comments']) ): ?>
						<?php foreach($post['comments'] as $comment): ?>
							<li>
								<strong><?php echo htmlspecialchars($comment['username'], ENT_QUOTES, 'UTF-8'); ?></strong> <?= $this->linkHashtags($comment['comment']); ?>
							</li>
						<?php endforeach; ?>
				<?php endif; ?>
			</ul>
		</div><!-- ./reacties -->
		<div class="reageren">
			<a href="<?=SITE_URL?>/?route=post/like&id=<?php echo htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8'); ?>" class="like" data-id="<?php echo htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8'); ?>"><i class="fa fa-heart-o"></i></a>
			<form action="<?=SITE_URL?>/?route=post/comment" method="post">
			<input type="hidden" value="<?php echo htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8'); ?>" class="post_id" name="post_id">
			<input type="text" class="reactie-plaatsen" name="comment" placeholder="Schrijf een reactie..." />
			<input type="submit" class="addComment" data-name="<?=$this->getUsername()?>" value="Post !">
			</form>
		</div><!-- ./reageren -->
	</div><!-- ./bottom -->
</section><!-- ./post -->