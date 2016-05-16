<h2>Zoekresultaten</h2>
<hr>

<?php if( empty( $results ) ): ?>
<h3>Er werden geen resultaten gevonden voor uw zoekopdracht.</h3>
<?php endif; ?>

<?php if( isset($results['users']) ): ?>
<h3>Users</h3>

<section class="acc-uploads">
	<ul>

<?php foreach($results['users'] as $user): ?>

		<li>
			<a href="<?=SITE_URL?>/?route=user/profile&id=<?=$user['id']?>">
				<img src="<?=$user['avatar']?>" alt="" />
				<h5><?=$user['username']?></h5>
			</a>
		</li>

<?php endforeach; ?>

	</ul>
</section>

<?php endif; ?>

<?php if( isset($results['posts']) ): ?>
<h3>Posts</h3>

<section class="acc-uploads">
	<ul>
<?php foreach($results['posts'] as $post): ?>
		<li>
			<a href="<?=SITE_URL?>/?route=user/view_post&id=<?=$post['id']?>">
				<figure class="<?=$post['filter']?>">
				<img src="<?=$post['image_url']?>" alt="" />
				</figure>
			</a>
		</li>
<?php endforeach; ?>
	</ul>
</section>

<?php endif; ?>