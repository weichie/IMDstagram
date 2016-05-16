<?php if( !$feed ): ?>
	<h2>Geen posts gevonden! Post zelf wat of volg peeps!</h2>
<?php else: ?>

	<?php foreach($feed as $post): ?>
	<section class="post">
		<header>
			<h5>
				<a href="">
					<img src="<?=$post['avatar']?>" />
					<strong><a href="<?=SITE_URL?>/?route=user/profile&id=<?=$post['id']?>"><?=$post['username']?></a></strong> 
				</a>
				<span class="pull-right"><?=$post['date']?></span>
			</h5>
		</header>

		<figure class="<?=$post['filter']?>">
		<div class="image" style="background-image:url('<?=$post['image_url']?>');"></div><!-- ./image -->
		</figure>
		
		<div class="bottom">
			<div class="reacties">
				<p class="poster">
					<?=$this->linkHashtags($post['description'])?>
				</p>
				<hr>
				<ul class="comments_<?=$post['post_id']?>">
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
				<a href="<?=SITE_URL?>/?route=post/like&id=<?=htmlentities($post['post_id'])?>" class="like" data-id="<?=$post['post_id']?>"><i class="fa fa-heart-o"></i></a>
				<form action="<?=SITE_URL?>/?route=post/comment" method="post">
				<input type="hidden" value="<?=$post['post_id']?>" class="post_id" name="post_id">
				<input type="text" class="reactie-plaatsen" name="comment" placeholder="Schrijf een reactie..." />
				<input type="submit" class="addComment" data-name="<?=$this->getUsername()?>" value="Post !">
				</form>
			</div><!-- ./reageren -->
		</div><!-- ./bottom -->
	</section><!-- ./post -->
	<?php endforeach; ?>
<?php endif; ?>