<h1>Ajouter un parcours</h1>

<?php
$db= new Mypdo();
$parcoursmanag= new ParcoursManager($db);
?>

<form id="saisieVille" method="post">
Ville 1:
<select name="ville">
<option value="Limoges">Limoges</option> 
Lyon
</select>
Ville 2:
<select name="ville2">
<option value="Bordeaux">Bordeaux</option> 
</select>
Nombre de kilomètre(s)
<select name="km">
256
</select>
  <input type="submit" id="valider" name="valider" value="valider">
</form>

<?php if (!empty($_POST['nom'])){
          $nom=$_POST["nom"];
          $req="insert into ville (vil_nom) values('$nom')";
          $result=$db->prepare($req)->execute();

          echo "La ville ".$_POST['nom']." a été ajoutée";
}?>
