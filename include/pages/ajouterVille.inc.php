
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
          $nom=$_POST["nom"];
          $req="insert into ville (vil_nom) values('$nom')";
          $result=$db->prepare($req)->execute();

          echo "La ville ".$_POST['nom']." a été ajoutée";
}?>
