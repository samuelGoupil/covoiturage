
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../../css/stylesheet.css" />
</head>
<h1>Ajouter une ville</h1>

<?php
$db= new Mypdo();
$personnemanag= new PersonneManager($db);
?>
 <?php if (empty($_POST["nom_ville"])) { ?>
  <form action="#" id="saisieVille" method="post">
    <label for="nom_ville">Nom :</label>
    <input id='inputperso' type="text" name="nom_ville">
    <input id="boutton" type="submit" id="valider" name="valider" value="valider">
  </form>
<?php } ?>

<?php if (!empty($_POST['nom_ville'])){
  $villemanag= new VilleManager($db);
  $result=$villemanag->AjouterVille($_POST['nom_ville']);
  if (!empty($result)){ ?>
    <p><img src="../image/valid.png" class="imagMenu" alt="valid"/>Trajet</p>
    <?php echo "La ville ".$_POST['nom_ville']." a été ajoutée";
  }
}?>
