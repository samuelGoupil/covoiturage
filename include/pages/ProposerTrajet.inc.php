
<h1>Proposer un trajet</h1>
<?php
$db= new Mypdo();
$parcoursmanag= new ParcoursManager($db);
$listeParcours=$parcoursmanag->getListParcours();

$parcoursvillemanag=new VilleManager($db);

?>

<?php if (empty($_POST['Ville1'])){ ?>
<form action="#" id="saisieVille" method="post">
<label>Ville 1:</label>
<select name="Ville1">
<?php foreach($listeParcours as $parcours){
  ?>
  <option> <?php echo $parcoursvillemanag->getVilleByID($parcours->getVil_num1())->getVil_nom(); ?>  </option>
  <option> <?php echo $parcoursvillemanag->getVilleByID($parcours->getVil_num2())->getVil_nom(); ?> 
  </option>
<?php } ?> 
</select>
<input type="submit" id="valider" name="valider" value="valider">
</form>
<?php }
if (!empty($_POST['Ville1'])){ 
  $_SESSION["Ville"]=$_POST["Ville1"];
  echo "Ville de depart : ".$_SESSION["Ville"];
 ?>
  <form action="#" id="SaisieTrajet" method="post">
  <label for="nom">Date de départ</label>
  <input type="date" id="nom" name="date">
  <label for="nbplace">Nombre de places</label>
  <input type="text" id="nom" name="nbplace">
  <label for="nbplace">Heure de départ</label>
  <input type="text" id="nom" name="heuredep">
  <label>Ville 1:</label>
  <select name="Ville1">
  <?php 

  $listeParcoursCompatible=$parcoursvillemanag->getVilleByNom($_SESSION["Ville"]->getVil_num);
  echo $listeParcoursCompatible;
  foreach($listeParcoursCompatible as $parcours){
  ?>
  <option> <?php echo $parcoursmanag->getVilleCompatible($parcours->getVil_num2())->getVil_nom(); ?>  </option>
  <?php
  } ?>
  <input type="submit" id="valider" name="valider" value="valider">
<?php
} ?>
