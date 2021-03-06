<?php if( !$feed ): ?>
	<h2>Geen posts gevonden! Post zelf wat of volg peeps!</h2>
<?php else: ?>

	<?php foreach($feed as $post): ?>
	<section class="post">
		<header>
			<h5>
				<a href="">
					<img src="<?=$post['avatar']?>" />
					<strong><a href="<?=SITE_URL?>/?route=user/profile&id=<?=$post['id']?>"><?=htmlspecialchars($post['username'], ENT_QUOTES, 'UTF-8');?></a></strong> 
				</a>
				<span class="pull-right"><?=$this->ago(strtotime($post['date']))?></span>
				<?php if( $post['id'] != $this->getUserID() ): ?>
					<a href="<?=SITE_URL?>/?route=post/report&id=<?=$post['post_id']?>" class="pull-right">Report!</a>
				<?php endif; ?>
			</h5>
		</header>

		<figure class="<?=$post['filter']?>">
			<div class="image" style="background-image:url('<?=$post['image_url']?>');"></div><!-- ./image -->
		</figure>
		
		<div class="bottom">
			<div class="reacties">
				<p class="poster">
					<?=$this->linkHashtags($post['description'])?> <i><?php echo htmlspecialchars($post['post_location'], ENT_QUOTES, 'UTF-8');?></i>
				</p>
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
				<a href="<?=SITE_URL?>/?route=post/like&id=<?php echo htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8'); ?>" class="like" data-id="<?php echo htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8'); ?>"><i class="fa <?=($this->hasLiked($post['post_id'])) ? 'fa-heart' : 'fa-heart-o'?>"></i></a>
				<form action="<?=SITE_URL?>/?route=post/comment" method="post">
					<input type="hidden" value="<?php echo htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8'); ?>" class="post_id" name="post_id">
					<input type="text" class="reactie-plaatsen" name="comment" placeholder="Schrijf een reactie..." />
					<input type="submit" class="btn btn-default btn-sm addComment pull-right" data-name="<?=$this->getUsername()?>" value="Post !">
				</form>
			</div><!-- ./reageren -->
		</div><!-- ./bottom -->
	</section><!-- ./post -->
	<?php endforeach; ?>
<?php endif; ?>