

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../css/stylesheet.css" />
</head>
<?php
$db= new Mypdo();
$personnemanag= new PersonneManager($db);
$listePersonne=$personnemanag->getList();

$etudiantmanag= new EtudiantManager($db);
$listeEtudiant=$etudiantmanag->getList();

$salariemanag=new SalarieManager($db);
$listeSalarie=$salariemanag->getList();

$departementmanag= new DepartementManager($db);
$fonctionmanag=new FonctionManager($db);
$villemanage=new VilleManager($db);

if(empty($_GET["per_num"])){?>

  <h1>Selectionner la personne à modifier</h1>

  Actuellement <?php echo sizeof($listePersonne) ?> personnes sont enregistrées.
  <table>
    <tr>
      <th>Numéro</th>
      <th>Nom</th>
      <th>Prenom</th>
    </tr>

  <?php
    foreach($listePersonne as $personne)
    { ?>
      <tr>
        <td>
          <a href="index.php?page=3&per_num=<?php echo $personne->getPer_num() ?>">
          <?php echo $personne->getPer_num(); ?>
        </td>
        <td> <?php echo $personne ->getPer_nom();?></td>
        <td> <?php echo $personne ->getPer_prenom();?></td>
      </tr>
    <?php
    }
  }
    ?>
</table>



<?php
if(!empty($_GET["per_num"])){
  $per_select = $personnemanag->getPersonne($_GET["per_num"]);
  foreach ($listeEtudiant as $etudiant) {
    if($_GET["per_num"]==$etudiant->getPer_num()){
      if(empty($_POST["modifier"])){
        $departement=$departementmanag->getDepartement($etudiant->getPer_num());
        $ville=$villemanage->getVille($departement->getVil_num());
        echo "<h1>Voulez-vous vraiment modifier l'étudiant ".$per_select->getPer_nom()."?</h1>";
        ?>
        <center>
          <table>
            <tr>
              <th>Prénom</th>
              <th>Mail</th>
              <th>Tel</th>
              <th>Département</th>
              <th>Ville</th>
            </tr>
            <tr>
              <td><?php echo $per_select->getPer_prenom()?></td>
              <td><?php echo $per_select->getPer_mail()?></td>
              <td><?php echo $per_select->getPer_tel()?></td>
              <td><?php echo $departement->getDep_nom() ?></td>
              <td><?php echo $ville->getVil_nom() ?></td>
            </tr>
          </table>
        </center>
        <form  method="post">
          <input type="submit" name="modifier" value="MODIFIER">
        </form>
        <?php
      }

      if(!empty($_POST["modifier"])){

        if(empty($_POST['nom']) && empty($_POST['prenom']) && empty($_POST['tel'])
        && empty($_POST['email'])&& empty($_POST['login'])&&
        empty($_POST['password']))
        {

        echo "<h1>Modification des informations de l'étudiant ".$per_select->getPer_nom()." :</h1>";
        ?>
        <form method="post">
        	<div id="right">
        		<label for="prenom">Prenom :</label>
        		<input id="inputperso"type="text" id="prenom" name="prenom" value="<?php echo $per_select->getPer_prenom()?>"><br>
        		<label for="email">Email :</label>
        		<input id="inputperso" type="email" id="email" name="email" value="<?php echo $per_select->getPer_mail()?>"><br>
        		<label for="password">Mot de passe :</label>
        		<input id="inputperso"type="password" id="password" name="password" value="<?php echo $per_select->getPer_pwd()?>"><br>
        	</div>

        	<div id="left">
        	<label for="nom">Nom :</label>
        	<input id="inputperso" type="text" id="nom" name="nom" value="<?php echo $per_select->getPer_nom()?>"><br>
        	<label for="tel">Téléphone :</label>
        	<input id="inputperso" type="tel" id="tel" name="tel" value="<?php echo $per_select->getPer_tel()?>"><br>
        	<label for="login">Login :</label>
        	<input id="inputperso" type="text" id="logoin" name="login" value="<?php echo $per_select->getPer_login()?>"><br><br>
        	</div>

        	<div id="center">
        		<input id="boutton" type="submit" name="Valider" value="Valider">
        	</div>
        </form>
        <?php
        }


        if(!empty($_POST['nom'])&&!empty($_POST['prenom'])&&!empty($_POST['tel'])
        &&!empty($_POST['email'])&&!empty($_POST['login'])&&
        !empty($_POST['password']))
        {
        $personnemanag->SupprimerPersonne($per_select->getPer_num());
        $personnemanag= new PersonneManager($db);
        $_SESSION["numpersonne"]=$personnemanag->AjouterPersonne($_POST['nom'], $_POST["prenom"], $_POST["tel"],
        $_POST["email"], $_POST["login"], $_POST["password"] );
        echo "L'étudiant a été modifié.";
        }
      }
    }
  }
  foreach ($listeSalarie as $salarie) {
    if($_GET["per_num"]==$salarie->getPer_num()){
      if(empty($_POST["supprimer"])){
        $fonction=$fonctionmanag->getFonction($salarie->getFon_num());
        echo "<h1>Voulez-vous vraiment supprimer le salarié ".$per_select->getPer_nom()." ?</h1>";
        ?>
        <center>
          <table>
            <tr>
              <th>Prénom</th>
              <th>Mail</th>
              <th>Tel</th>
              <th>Tel pro</th>
              <th>Fonction</th>
            </tr>
            <tr>
              <td><?php echo $per_select->getPer_prenom()?></td>
              <td><?php echo $per_select->getPer_mail()?></td>
              <td><?php echo $per_select->getPer_tel()?></td>
              <td><?php echo $salarie->getSal_telprof() ?></td>
              <td><?php echo $fonction->getFon_libelle() ?></td>
            </tr>
          </table>
        </center>
        <form  method="post">
          <input type="submit" name="supprimer" value="SUPPRIMER">
        </form>
        <?php
      }
      if(!empty($_POST["supprimer"])){
        $salariemanag->SupprimerSalarie($salarie->getPer_num());
        $personnemanag->SupprimerPersonne($per_select->getPer_num());
        echo "<h1>Le salarie ".$per_select->getPer_nom()."a été supprimé</h1>";
      }
    }
  }
}


 ?>
