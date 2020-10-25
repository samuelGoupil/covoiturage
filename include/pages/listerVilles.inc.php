
<h1>Liste des villes</h1>

<?php
$db= new Mypdo();
$villemanag= new VilleManager($db);
?>

<?php
$listeVille=$villemanag->getList();
foreach($listeVille as $ville){
?>
  <tr>
    <td> <?php echo $ville ->getVil_num();?></td>
    <td> <?php echo $ville ->getVil_nom();?></td>
  </tr>
<?php
}
?>




 ?>

//A COMPLETER
