<h1>Ajouter un parcours</h1>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../css/stylesheet.css" />
</head>
<?php
$db= new Mypdo();
$villemanag= new VilleManager($db);
$villes=$villemanag->getList();
?>

<?php 
if (empty($_POST['Ville1']) and empty($_POST["Ville2"]) and empty($_POST["km"])){ ?>
    <form action="#" id="saisieParcours" method="post">
      <label>Ville 1:</label>
      <select class="colonne:nth-child" name="Ville1">
        <?php foreach($villes as $ville){   ?>
          <option value="<?php echo $ville->getVil_num(); ?>"> <?php echo $ville->getVil_nom(); ?> </option>
        <?php } ?> 
      </select>
      <label>Ville 2:</label>
      <select name="Ville2">
      <?php 
        foreach($villes as $ville)
        { ?>
          <option value="<?php echo $ville->getVil_num(); ?>"> <?php echo $ville->getVil_nom(); ?> </option>
  <?php } ?>  
      </select>
      <label>Nombre de kilomètre(s)</label>
      <input id="inputperso" type="number" name="km"/> 
      <input id="boutton" type="submit" id="valider" name="valider" value="valider">
    </form>
<?php } 

if (!empty($_POST['Ville1']) and !empty($_POST["Ville2"]) and !empty($_POST["km"])){
  $parcoursmanag= new ParcoursManager($db);
  $result=$parcoursmanag->AjouterParcours($_POST["km"], $_POST["Ville1"], $_POST["Ville2"]);
  if (!empty($result)){ ?>
    <img src="image/valid.png" class="imagMenu" alt="valid"/> <?php echo"Parcours ajouté! ";
  }
  else{ ?>
    <img src="image/erreur.png" class="imagMenu" alt="valid"/><?php echo "Parcours non ajouté";
  }
}
?>