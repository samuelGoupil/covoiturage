
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../css/stylesheet.css" />
</head>
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

  <h1>Selectionner la personne à supprimer</h1>

  Actuellement <?php echo sizeof($listePersonne) ?> personnes sont enregistrées.
  <table>
    <tr>
      <th>Numéro</th>
      <th>Nom</th>
      <th>Prenom</th>
    </tr>

  <?php
    foreach($listePersonne as $personne)
    { ?>
      <tr>
        <td>
          <a href="index.php?page=4&per_num=<?php echo $personne->getPer_num() ?>">
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



<?php
if(!empty($_GET["per_num"])){
  $per_select = $personnemanag->getPersonne($_GET["per_num"]);
  foreach ($listeEtudiant as $etudiant) {
    if($_GET["per_num"]==$etudiant->getPer_num()){
      if(empty($_POST["supprimer"])){
        $departement=$departementmanag->getDepartement($etudiant->getPer_num());
        $ville=$villemanage->getVille($departement->getVil_num());
        echo "<h1>Voulez-vous vraiment supprimer l'étudiant ".$per_select->getPer_nom()."?</h1>";
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
        <form  method="post">
          <input type="submit" name="supprimer" value="SUPPRIMER">
        </form>
        <?php
      }

      if(!empty($_POST["supprimer"])){
        $etudiantmanag->SupprimerEtudiant($etudiant->getPer_num());
        $personnemanag->SupprimerPersonne($per_select->getPer_num());
        echo "<h1>L'étudiant ".$per_select->getPer_nom()."a été supprimé</h1>";
      }
    }
  }
  foreach ($listeSalarie as $salarie) {
    if($_GET["per_num"]==$salarie->getPer_num()){
      if(empty($_POST["supprimer"])){
        $fonction=$fonctionmanag->getFonction($salarie->getFon_num());
        echo "<h1>Voulez-vous vraiment supprimer le salarié ".$per_select->getPer_nom()." ?</h1>";
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
        <form  method="post">
          <input type="submit" name="supprimer" value="SUPPRIMER">
        </form>
        <?php
      }
      if(!empty($_POST["supprimer"])){
        $salariemanag->SupprimerSalarie($salarie->getPer_num());
        $personnemanag->SupprimerPersonne($per_select->getPer_num());
        echo "<h1>Le salarie ".$per_select->getPer_nom()."a été supprimé</h1>";
      }
    }
  }
}


 ?>
