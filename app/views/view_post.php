<section class="post">
	<header>
		<h5>
			<a href="#!">
				<img src="<?=$post['avatar']?>" />
				<?=$post['username']?>
			</a>
			<span class="pull-right"><?=$this->ago(strtotime($post['date']))?></span>
			<a href="<?=SITE_URL?>/?route=user/deletePost&id=<?=htmlentities($post['id'])?>" class="pull-right">foto verwijderen?</a>
		</h5>
	</header>

	<div class="image" style="background-image:url('<?=$post['image_url']?>')"></div><!-- ./image -->
	
	<div class="bottom">
		<div class="reacties">
			<p class="poster">
				<strong><?=$post['username']?></strong> <?=$this->linkHashtags($post['description'])?>
			</p>
			<ul>
				<li>
				Moetk nog doen :)
				</li>
				<li>
					<strong>Yame</strong>
					Lorem ipsum dolor sit amet :)
				</li>
				<li>
					<strong>Yame</strong>
					Lorem ipsum dolor sit amet :)
				</li>
			</ul>
		</div><!-- ./reacties -->
		<div class="reageren">
			<a href="#!"><i class="fa fa-heart-o"></i></a>
			<input type="text" class="reactie-plaatsen" placeholder="Schrijf een reactie..." />
		</div><!-- ./reageren -->
	</div><!-- ./bottom -->
</section><!-- ./post -->