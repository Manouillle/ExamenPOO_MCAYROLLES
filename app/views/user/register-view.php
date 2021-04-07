<?php
	// Importing header.
	require_once('app/views/parts/header.php');
?>

<main>
	<?php
		if (isset($errors)) {
			?>
			
			<div class="row my-4">
				<div class="col-8 mx-auto">
					<div class="card shadow text-light bg-dark p-4">
						<h2 class="text-warning text-center"><?= sizeof($errors) > 1 ? 'Erreurs' : 'Erreur' ?></h2>
						<ul class="mt-2">
							<?php
								foreach ($errors as $error) {
									?>

									<li><?= $error ?></li>

									<?php
								}
							?>
						</ul>
					</div>
				</div>
			</div>

			<?php
		}
	?>
	<div class="row my-4">
		<div class="col-8 mx-auto">
			<div class="card shadow text-light bg-dark p-4">
				<h2 class="text-center">Création de compte</h2>
				<form method="post" action="index.php?page=user&action=register">
					<div class="form-group">
						<label for="username">Nom d'utilisateur</label>
						<input id="username" class="form-control" type="text" name="username" placeholder="Nom d'utilisateur...">
					</div>
					<div class="form-group">
						<label for="password">Mot de passe</label>
						<input id="password" class="form-control" type="password" name="password" placeholder="Mot de passe...">
					</div>
					<div class="form-group">
						<label for="password-confirm">Confirmation mot de passe</label>
						<input id="password-confirm" class="form-control" type="password" name="password-confirm" placeholder="Mot de passe...">
					</div>
					<div class="text-center mt-4">
						<button class="btn btn-primary" type="submit">S'enregistrer</button>
					</div>
					<div class="text-center mt-4">
						<a class="text-light" href="index.php?page=user&action=login">J'ai déjà un compte ! </a>
					</div>
				</form>
			</div>
		</div>
	</div>
</main>

<?php
	// Importing footer.
	require_once('app/views/parts/footer.php');
?>