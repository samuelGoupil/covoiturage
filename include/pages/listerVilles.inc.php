<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../css/stylesheet.css" />
</head>
<h1>Liste des villes</h1>

<?php
$db= new Mypdo();
$villemanag= new VilleManager($db);
$req="select count(*) from ville";
$result=$db->prepare($req)->execute();
?>
Actuellement <?php echo $result; ?> villes sont enregistrées.

<table>
  <tr>
    <th>Numero</th>
    <th>Ville</th>
  </tr>


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
</table>
