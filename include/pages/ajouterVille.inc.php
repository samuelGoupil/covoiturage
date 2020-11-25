
<h1>Ajouter une ville</h1>

<?php
$db= new Mypdo();
$personnemanag= new PersonneManager($db);
?>

<form id="saisieNom" method="post">
  <label for="nom">Nom :</label>
  <input type="text" id="nom" name="nom">
  <input type="submit" id="valider" name="valider" value="valider">
</form>

<?php if (!empty($_POST['nom'])){
  $villemanag= new VilleManager($db);
  $result=$villemanag->AjouterVille($_POST['nom']);

          echo "La ville ".$_POST['nom']." a été ajoutée";
}?>
