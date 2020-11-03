<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../css/stylesheet.css" />
</head>
<h1>Liste des parcours</h1>

<?php
$db= new Mypdo();
$parcoursmanag= new ParcoursManager($db);
$parcoursvillemanag=new VilleManager($db);
$listeParcours=$parcoursmanag->getListParcours();
?>
Actuellement <?php echo sizeof($listeParcours)+1; ?>  parcours sont enregistrés.
<center>
<table>
  <tr>
    <th>Numero</th>
    <th>Nom ville</th>
    <th>Nom ville</th>
    <th>Nombre de Km</th>
  </tr>


<?php

  /*$listeville=$parcoursvillemanag->getListVilleParcours();*/
  foreach($listeParcours as $parcours){
  ?>
      <tr>
        <td> <?php echo $parcours ->getPar_num();?></td>
        <td> <?php echo $parcours ->getPar_km();?></td>   
        <td> <?php echo $parcours ->getVil_num1();?></td>
        <td> <?php echo $parcours ->getVil_num2();?></td>   
        <?php
         }
        ?>
      </tr>

</table>
</center>
