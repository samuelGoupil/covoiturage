
<h1>Proposer un trajet</h1>
<?php
$db= new Mypdo();
$parcoursmanag= new ParcoursManager($db);
$parcoursville=$parcoursmanag->getListParcours();
$parcoursvillemanag=new VilleManager($db);
$villes=$parcoursvillemanag->getList();

?>

<?php if (empty($_POST['Ville1']) and empty($_POST["Ville2"]) and empty($_POST["km"])){ ?>
<form action="#" id="saisieParcours" method="post">
<label>Ville 1:</label>
<select name="Ville1">
<?php foreach($villes as $ville){
  ?>
  <option> <?php echo $parcoursvillemanag->getVilleByID($parcours->getVil_num1())->getVil_nom(); ?> 
  </option>
<?php } ?> 
</select>
</form>
<?php } ?>
