<h1>Liste des personnes enregistrées</h1>

<?php
$db= new Mypdo();
$personnemanag= new PersonneManager($db);
$req="select count(*) from personne";
$result=$db->prepare($req)->execute();
?>
Actuellement <?php echo $result; ?> personnes sont enregistrées.

<table>
  <tr>
    <th>Numero</th>
    <th>Ville</th>
  </tr>
<?php
  $listePersonne=$personnemanag->getList();
  foreach($listePersonne as $personne){
  ?>
      <tr>
        <td> <?php echo $personne ->getPer_num();?></td>
        <td> <?php echo $personne ->getPer_nom();?></td>
        <td> <?php echo $personne ->getPer_prenom();?></td>
      </tr>

  <?php
  }
  ?>
</table>
