
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../css/stylesheet.css" />
</head>
<?php error_reporting(0); 
if (!empty ($_SESSION["login"])){ ?><h1>Proposer un trajet</h1>
  <?php
  $db= new Mypdo();
  $parcoursmanag= new ParcoursManager($db);
  $villemanag=new VilleManager($db);
  $proposemanag= new ProposeManager($db);
  $listeParcours=$parcoursmanag->getAllVillesParcours();
  $datefr=date("H")+1;
  ?>

  <?php
  if (empty($_POST['Ville1'])){ ?>
    <form action="#" id="saisieVille" method="post">
      <label>Ville 1:</label>
      <select name="Ville1">
        <?php foreach($listeParcours as $parcours){
    ?>
          <option value="<?php echo $parcours->getVil_num() ?>"> <?php echo $parcours->getVil_nom(); ?>  </option>
    <?php } ?> 
      </select>
      <input type="submit" id="boutton" name="valider" value="valider">
    </form>
    <?php    
    }

if (!empty($_POST['Ville1'])){ 
    $_SESSION["num_ville1"]=$_POST["Ville1"];
    $nomvillechoisie= $villemanag->getVilleByID($_SESSION["num_ville1"]);
    $nom_ville1=$nomvillechoisie->getVil_nom();
    echo "Ville de depart : ".$nom_ville1; ?>
    <form action="##" id="SaisieTrajet" method="post">
      <label for="nom">Date de départ</label>
      <input id="inputperso" type="date" id="date" name="date" value=<span id="datetime"></span>
      <label for="nbplace">Nombre de places</label>
      <input id="inputperso" type="text" id="nom" name="nbplace">
      <label for="nbplace">Heure de départ</label>
      <input id="inputperso" type="text" id="nom" name="heuredep" value="<?php echo $datefr.date(":i:s"); ?>">
      <label>Ville arrivée:</label>
      <select name="num_ville2">
    <?php 
        $villearrivee=$parcoursmanag->getAllParcours($_SESSION["num_ville1"]);
        var_dump($villearrivee);
        foreach ($villearrivee as $villes){ ?> 
          <option value="<?php echo $villes->getVil_num() ?>"> <?php echo $villes->getVil_nom(); ?>  </option>
      <?php
    } ?>
    </select>
    <input type="submit" id="boutton" name="valider" value="valider">
    </form>
  <?php
  }
  if (!empty($_POST['num_ville2']) && !empty($_POST['date']) && !empty($_POST['nbplace']) && !empty($_POST['heuredep'])){
    $num_ville2=$_POST['num_ville2'];
    $cherche_trajet_sens=$parcoursmanag->getNumVilles($_SESSION["num_ville1"], $num_ville2);
    foreach ($cherche_trajet_sens as $trajet){
      $_SESSION["num_parcours"]=$trajet->getPar_num();
    }
    if(!empty ($_SESSION["num_parcours"])){
      $trajet_sens=0;
      $cherche_trajet_sens=$parcoursmanag->getNumVilles($_SESSION["num_ville1"], $num_ville2);
      foreach ($cherche_trajet_sens as $trajet){
        $_SESSION["num_parcours"]=$trajet->getPar_num();
      }
      $ajoutPropose=$proposemanag->AjouterTrajet($_SESSION["num_parcours"], $_SESSION["num"], $_POST['date'],$_POST['heuredep'], $_POST['nbplace'], $trajet_sens);
    }
    else {
        $trajet_sens=1;
        $ajoutPropose=$proposemanag->AjouterTrajet($_SESSION['num_parcours'], $_SESSION["num"], $_POST['date'], $_POST['heuredep'], $_POST['nbplace'],$trajet_sens);
    }
    if(!empty($ajoutPropose)){
      echo "Trajet ajouté";
      unset($_SESSION["num_parcours"]); ?>
      <script type='text/javascript'>window.location.href='index.php'</script>
      <?php
    } 
  }
}?>
