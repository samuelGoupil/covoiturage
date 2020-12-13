
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../css/stylesheet.css" />
</head>
<?php if (!empty ($_SESSION["login"])){ ?> <h1>Rechercher un trajet</h1>
<?php
$db= new Mypdo();
$proposemanag= new ProposeManager($db);
$listepropose=$proposemanag->getListPropose();
$parcoursvillemanag=new VilleManager($db);
?>

<?php
if (empty($_POST['Ville1'])){ ?>
    <form action="#" id="saisieVille" method="post">
    <label>Ville 1:</label>
    <select name="Ville1">
    <?php foreach($listepropose as $propose){
    ?>
<?php echo $parcoursvillemanag->getVilleByID($propose->getPar_num())->getVil_nom(); ?> 

    <?php } ?> 
    </select>
    <input type="submit" id="valider" name="valider" value="valider">
    </form>
    <?php    
    }
} ?>
