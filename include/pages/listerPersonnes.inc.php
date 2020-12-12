<h1>Liste des personnes enregistrées</h1>

<?php
$db= new Mypdo();
$personnemanag= new PersonneManager($db);
$listePersonne=$personnemanag->getList();

$etudiantmanag= new EtudiantManager($db);
$etudiant=$etudiantmanag->getList();

if(empty($_GET["per_num"])){?>

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
          <td>
            <a href="index.php?page=2&per_num=<?php echo $personne->getPer_num() ?>">
            <?php echo $personne->getPer_num(); ?>
          </td>
          <td> <?php echo $personne ->getPer_nom();?></td>
          <td> <?php echo $personne ->getPer_prenom();?></td>
        </tr>

    <?php
    }
  }
    ?>
  </table>
</center>



<?php
if(!empty($_GET["per_num"])){
  $per_select = $personnemanag->getPersonne($_GET["per_num"]);
  foreach ($etudiant as $etudiant) {
    if($_GET["per_num"]==$etudiant->getPer_num()){
      echo "<h1>Détail sur l'étudiant ".$per_select->getPer_nom()."</h1>";
    }
  }
}


 ?>
