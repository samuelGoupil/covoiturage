<h1>Liste des personnes enregistrées</h1>

<?php
$db= new Mypdo();
$personnemanag= new PersonneManager($db);
$listePersonne=$personnemanag->getList();
?>
Actuellement <?php echo sizeof($listePersonne) ?> personnes sont enregistrées.
<center>
  <table>
    <tr>
      <th>Numero</th>
      <th>nom</th>
      <th>prenom</th>
    </tr>
  <?php

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
</center>
