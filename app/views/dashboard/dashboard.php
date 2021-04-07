<?php
	require_once('app/views/parts/header.php');
?>

<h1>Liste des équipes</h1>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">Score</th>
      <th scope="col">But encaissés</th>
      <th scope="col">But marqués</th>
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
                    <td></td>
                </tr>
                <?php } ?>
            </tbody>
</table>
	
<?php
	require_once('app/views/parts/footer.php');
?>

