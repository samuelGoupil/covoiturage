<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../css/stylesheet.css" />
</head>
<h1>Liste des parcours</h1>

<?php
$db= new Mypdo();
$parcoursmanag= new ParcoursManager($db);
$listeParcours=$parcoursmanag->getListParcours();

$parcoursvillemanag=new VilleManager($db);
?>
Actuellement <?php echo sizeof($listeParcours)+1; ?>  parcours sont enregistrés.
<table>
  <tr>
    <th>Numero</th>
    <th>Nom ville</th>
    <th>Nom ville</th>
    <th>Nombre de Km</th>
  </tr>


<?php
  foreach($listeParcours as $parcours){
      ?>
      <tr>
        <td> <?php echo $parcours ->getPar_num();?></td>
        <td> <?php echo $parcoursvillemanag->getVilleByID($parcours->getVil_num1())->getVil_nom();?></td> 
        <td> <?php echo $parcoursvillemanag->getVilleByID($parcours->getVil_num2())->getVil_nom();?></td>     
        <td> <?php echo $parcours ->getPar_km();?></td>   
        </tr>
        <?php
      }
         ?>
  </table>
