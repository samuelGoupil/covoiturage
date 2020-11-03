<h1>Selectionner la personne à supprimer</h1>

<?php
$db= new Mypdo();
$personnemanag= new PersonneManager($db);
$req="select count(*) from personne";
$result=$db->prepare($req)->execute();
?>

<table>
  <tr>
    <th>Numero</th>
    <th>nom</th>
    <th>prenom</th>
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
