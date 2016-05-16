<?php if( isset($login_message) ): ?>
<div class="alert alert-warning">
	<?= $login_message ?>	
</div>
<?php endif; ?>

<form action="<?=SITE_URL?>/?route=user/login" method="post" class="login-form">
	<div class="form-group">
		<label for="email">Email</label>
		<input type="email" class="form-control" name="email" id="email" placeholder="Email">
	</div>
	<div class="form-group">
		<label for="password">Password</label>
		<input type="password" class="form-control" name="password" id="password" placeholder="Password">
	</div>
	<button type="submit" name="login" class="btn btn-primary">Aanmelden</button><br>
	<a href="#!">Wachtwoord vergeten?</a><br>
	<a href="<?=SITE_URL?>/?route=user/register">Een nieuw account registreren</a>
</form>