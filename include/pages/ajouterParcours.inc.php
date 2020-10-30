<h1>Ajouter un parcours</h1>

<?php
$db= new Mypdo();
$parcoursmanag= new ParcoursManager($db);
?>

<form id="saisieParcours" method="post">
Ville 1:
<select name="ville1">
<option name="Ville1">Limoges</option> 
</select>
Ville 2:
<select name="ville2">
<option name="Ville2">Bordeaux</option> 
</select>
Nombre de kilomètre(s)
<select name="km">
<option name="km"></option> 
256
</select>
  <input type="submit" id="valider" name="valider" value="valider">
<?php if (!empty($_POST['ville1']) and !empty($_POST[ville2]) and !empty($_POST["km"])){
          $vil_num1=$_POST["Ville1"];
          $vil_num2=$_POST["Ville2"];
          $km=$_POST["km"];
          $req="insert into parcours (par_km,vil_num1,vil_num2) values('$km','$vil_num1', '$vil_num2')";
          $result=$db->prepare($req)->execute();

          echo "Le parcours a été ajoutée";
}?>
</form>

