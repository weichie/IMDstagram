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
			<a href="<?=SITE_URL?>/?route=user/profile&id=<?php echo htmlspecialchars($user['id'], ENT_QUOTES, 'UTF-8'); ?>">
				<img src="<?php echo htmlspecialchars($user['avatar'], ENT_QUOTES, 'UTF-8'); ?>" alt="" />
				<h5><?php echo htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8'); ?></h5>
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
			<a href="<?=SITE_URL?>/?route=user/view_post&id=<?php echo htmlspecialchars($post['id'], ENT_QUOTES, 'UTF-8'); ?>">
				<figure class="<?php echo htmlspecialchars($post['filter'], ENT_QUOTES, 'UTF-8'); ?>">
				<img src="<?php echo htmlspecialchars($post['image_url'], ENT_QUOTES, 'UTF-8'); ?>" alt="" />
				</figure>
			</a>
		</li>
<?php endforeach; ?>
	</ul>
</section>

<?php endif; ?>