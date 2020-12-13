
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../css/stylesheet.css" />
</head>
<?php if (!empty ($_SESSION["login"])){ ?> <h1>Rechercher un trajet</h1>
<?php
$db= new Mypdo();
$proposemanag= new ProposeManager($db);
$listepropose=$proposemanag->getListPropose();
$villemanag=new VilleManager($db);
$parcoursmanag=new ParcoursManager($db);
$listepropose=$proposemanag->getAllVillesPropose();
?>

<?php
if (empty($_POST['num_parcours'])){ ?>
    <form action="#" id="saisieTrajet" method="post">
    <label>Parcours:</label>
    <select name="num_parcours">
    <?php foreach($listepropose as $propose){
    ?>
    <option> <?php echo $propose->getPar_num()?> </option>

    <?php } ?> 
    </select>
    <input type="submit" id="boutton" name="valider" value="valider">
    </form>
    <?php    
    }
    if (!empty($_POST['num_parcours'])){ 
        $_SESSION["num_parcours"]=$_POST["num_parcours"];
        $nom_ville1_parcours= $parcoursmanag->getAllParcoursNum($_SESSION["num_parcours"]);
        foreach($nom_ville1_parcours as $villeparcours){
        $nom_ville1=$villeparcours->getVil_nom();
        }
        echo "Ville de depart : ".$nom_ville1; ?>
        <form action="#" id="SaisieTrajet" method="post">
          <label for="nom">Date de départ</label>
          <input id="inputperso" type="date" id="date" name="date" value=<span id="datetime"></span>
          <label for="nbplace">à partir de:</label>
          <select name="precision">
            <?php
          for ($i = 0; $i <= 23; $i++) { ?>
                <option value="<?php $i ?>"><?php echo $i."h" ?></option>
            <?php } ?>
            </select>
            <label for="nbplace">Précision</label>

          <input id="inputperso" type="text" id="nom" name="nbplace">
          <label for="nbplace">Heure de départ</label>
          <input id="inputperso" type="text" id="nom" name="heuredep">
          <label>Ville arrivée:</label> 
          <select name="num_ville2">
          <?php $villearrivee=$parcoursmanag->getAllParcoursNum($_SESSION["num_ville1"]);
        foreach ($villearrivee as $villes){ ?> 
          <option value="<?php echo $villes->getVil_num() ?>"> <?php echo $villes->getVil_nom(); ?>  </option>
      <?php
    } ?>
    </select>
    <input type="submit" id="boutton" name="valider" value="valider"> <?php
    if(!empty($_POST["date"])&&!empty($_POST["date"]&&)&&!empty($_POST["heuredep"])){
        $cherche_trajet=$proposemanag->rechercheTrajet($_SESSION["num_parcours"], $_POST["date"],$_POST["precision"], $_POST["heuredep"]); 
    }
 } 
}?>
