<?php if( !$feed ): ?>
	<h2>Geen posts gevonden! Post zelf wat of volg peeps!</h2>
<?php else: ?>
	<?php foreach($feed as $post): ?>
	<section class="post">
		<header>
			<h5>
				<a href="#!">
					<img src="<?=$post['avatar']?>" />
					<strong><a href=""><?=$post['username']?></a></strong> 
				</a>
				<span class="pull-right"><?=$post['date']?></span>
			</h5>
		</header>

		<div class="image" style="background-image:url('<?=$post['image_url']?>');"></div><!-- ./image -->
		
		<div class="bottom">
			<div class="reacties">
				<p class="poster">
					<strong><a href=""><?=$post['username']?></a></strong> 
					<?=$post['description'];?>
				</p>
				<ul>
					<!--
					<li>
						<strong>Yame</strong>
						Lorem ipsum dolor sit amet :)
					</li>
					<li>
						<strong>Yame</strong>
						Lorem ipsum dolor sit amet :)
					</li>-->
				</ul>
			</div><!-- ./reacties -->
			<div class="reageren">
				<a href="#!"><i class="fa fa-heart-o"></i></a>
				<input type="text" class="reactie-plaatsen" placeholder="Schrijf een reactie..." />
			</div><!-- ./reageren -->
		</div><!-- ./bottom -->
	</section><!-- ./post -->
	<?php endforeach; ?>
<?php endif; ?>