<section class="acc-details">
	<div class="col-xs-12 col-sm-4 pic">
		<img src="https://randomuser.me/api/portraits/men/69.jpg">
	</div><!-- ./picture -->
	<div class="col-xs-12 col-sm-8 bio">
		<h4>Weichiie<a href="?p=edit-profile">profiel bewerken</a></h4>
		<p>
			<strong>Bob Weichler</strong> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit explicabo eos facere eligendi asperiores minima, nulla, ducimus eaque illo deleniti. Ratione adipisci excepturi, quidem veritatis optio fuga officiis nostrum assumenda.
			<a href="#!">www.weichieprojects.com</a>
		</p>
		<ul>
			<li><strong>31</strong> berichten</li>
			<li><strong>98</strong> volgers</li>
			<li><strong>93</strong> volgend</li>
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