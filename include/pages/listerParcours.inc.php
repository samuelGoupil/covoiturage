<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../css/stylesheet.css" />
</head>
<h1>Liste des parcours</h1>

<?php
$db= new Mypdo();
$parcoursmanag= new ParcoursManager($db);
$listeParcours=$parcoursmanag->getListParcours();

$db2= new Mypdo();
$parcoursvillemanag=new VilleManager($db2);
$listeParcoursVille=$parcoursvillemanag->getListVilleParcours();

$parcoursvillemanag2=new VilleManager($db2);
$listeParcoursVille2=$parcoursvillemanag2->getListVilleParcours2();
?>
Actuellement <?php echo sizeof($listeParcours)+1; ?>  parcours sont enregistrés.
<center>
<table>
  <tr>
    <th>Numero</th>
    <table>
    <tr>
    <th>Nom ville</th>
    <th>Nom ville</th>
    <th>Nombre de Km</th>
  </tr>


<?php
  foreach($listeParcours as $parcours){
    foreach($listeParcoursVille as $ville){
      ?>
      <tr>
        <td> <?php echo $parcours ->getPar_num();?></td>
        <td> <?php echo $ville ->getVil_nom();?></td>     
        <td> <?php echo $parcours ->getPar_km();?></td>   
        <?php
         }
      }
         ?>
      </tr>
  </table>
</center>
