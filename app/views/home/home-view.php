<?php
	// Importing header.
	require_once('app/views/parts/header.php');
?>

<main>
    <div class="row my-4">
        <div class="col-8 mx-auto">
            <div class="card shadow text-light bg-dark p-4">
                <h2 class="text-center">Bienvenue <?= $_SESSION['username'] ?> !</h2>
                <div class="text-center mt-4">
                    <a href="index.php?page=user&action=logout"><button class="btn btn-danger">Déconnexion</button></a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <h2 style="color: brown; text-align: center"> Liste équipes </h2>
        <div>
        <button name="create" type="button" class="btn btn-success shadow"
              style="margin-right: 20px; color: white;">
              Ajouter
            </button>
        </div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Score</th>
                    <th>But encaissés</th>
                    <th>But marqués</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($Equipes as $equipe) { 
       $club = $equipe->getId();
       ?>
                <tr>

                    <td><?php echo $equipe->getId(); ?></td>
                    <td><?php echo $equipe->getName(); ?></td>
                    <td><?php echo $equipe->getPoint(); ?></td>
                    <td> <?php echo $equipe->getButEncaisse();?></td>
                    <td><?php echo $equipe->getButMarque(); ?></td>
                    <td>
            <button name="edit" type="button" class="btn btn-warning shadow"
              style="margin-right: 20px; color: white;">
              Modifier
            </button>
            <button name="delete" type="button" class="btn btn-danger shadow">
              Supprimer
            </button></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</main>








<?php
	// Importing footer.
	require_once('app/views/parts/footer.php');
?>