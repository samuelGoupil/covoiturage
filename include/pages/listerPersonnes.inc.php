
<?php
$db= new Mypdo();
$personnemanag= new PersonneManager($db);
$listePersonne=$personnemanag->getList();

$etudiantmanag= new EtudiantManager($db);
$listeEtudiant=$etudiantmanag->getList();

$salariemanag=new SalarieManager($db);
$listeSalarie=$salariemanag->getList();

$departementmanag= new DepartementManager($db);
$fonctionmanag=new FonctionManager($db);
$villemanage=new VilleManager($db);

if(empty($_GET["per_num"])){?>

  <h1>Liste des personnes enregistrées</h1>

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
  foreach ($listeEtudiant as $etudiant) {
    if($_GET["per_num"]==$etudiant->getPer_num()){
      $departement=$departementmanag->getDepartement($etudiant->getPer_num());
      $ville=$villemanage->getVille($departement->getVil_num());
      echo "<h1>Détail sur l'étudiant ".$per_select->getPer_nom()."</h1>";
      ?>
      <center>
        <table>
          <tr>
            <th>Prénom</th>
            <th>Mail</th>
            <th>Tel</th>
            <th>Département</th>
            <th>Ville</th>
          </tr>
          <tr>
            <td><?php echo $per_select->getPer_prenom()?></td>
            <td><?php echo $per_select->getPer_mail()?></td>
            <td><?php echo $per_select->getPer_tel()?></td>
            <td><?php echo $departement->getDep_nom() ?></td>
            <td><?php echo $ville->getVil_nom() ?></td>
          </tr>
        </table>
      </center>
      <?php
    }
  }
  foreach ($listeSalarie as $salarie) {
    if($_GET["per_num"]==$salarie->getPer_num()){
      $fonction=$fonctionmanag->getFonction($salarie->getFon_num());
      echo "<h1>Détail sur le salarie ".$per_select->getPer_nom()."</h1>";
      ?>
      <center>
        <table>
          <tr>
            <th>Prénom</th>
            <th>Mail</th>
            <th>Tel</th>
            <th>Tel pro</th>
            <th>Fonction</th>
          </tr>
          <tr>
            <td><?php echo $per_select->getPer_prenom()?></td>
            <td><?php echo $per_select->getPer_mail()?></td>
            <td><?php echo $per_select->getPer_tel()?></td>
            <td><?php echo $salarie->getSal_telprof() ?></td>
            <td><?php echo $fonction->getFon_libelle() ?></td>
          </tr>
        </table>
      </center>
      <?php
    }
  }
}


 ?>
