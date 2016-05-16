<?php if( isset($register_message) ): ?>
<div class="alert alert-warning">
	<?= $register_message ?>	
</div>
<?php endif; ?>
<form action="" method="post" class="login-form">
	<div class="form-group">
		<label for="email">Email</label>
		<input type="email" class="form-control" name="email" id="email" placeholder="Email">
	</div>
	<div class="form-group">
		<label for="username">Username</label>
		<input type="username" class="form-control" name="username" id="username" placeholder="Username">
	</div>
	<div class="form-group">
		<label for="password">Password</label>
		<input type="password" class="form-control" name="password" id="password" placeholder="Password">
	</div>
	<button type="submit" name="register" class="btn btn-primary">Registreren</button><br>
	<a href="<?=SITE_URL?>/?route=user/login">Aanmelden met een bestaand account</a>
</form>