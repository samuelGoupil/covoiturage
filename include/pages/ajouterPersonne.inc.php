<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../../css/stylesheet.css" />
</head>
<?php
$db= new Mypdo();
//	$personne= new PersonneManager($db);

if(empty($_POST['nom']) && empty($_POST['prenom']) && empty($_POST['tel'])
&& empty($_POST['email'])&& empty($_POST['login'])&&
empty($_POST['password']))
{ 	?>

<h1>Ajouter une personne</h1>
<form method="post">
	<div id="right">
		<label for="prenom">Prenom :</label>
		<input id="inputperso"type="text" id="prenom" name="prenom"><br>
		<label for="email">Email :</label>
		<input id="inputperso" type="email" id="email" name="email"><br>
		<label for="password">Mot de passe :</label>
		<input id="inputperso"type="password" id="password" name="password"><br>
	</div>

	<div id="left">
	<label for="nom">Nom :</label>
	<input id="inputperso" type="text" id="nom" name="nom"><br>
	<label for="tel">Téléphone :</label>
	<input id="inputperso" type="tel" id="tel" name="tel"><br>
	<label for="login">Login :</label>
	<input id="inputperso" type="text" id="logoin" name="login"><br><br>
	</div>

	<div id="center">
		<label for="categorie">Catégorie :</label>
		<input checked type="radio" name="role" value="etudiant">
		<label for="Etudiant">Etudiant</label>
		<input type="radio" name="role" value="personnel">
		<label for="Personnel">Personnel</label><br><br>
		<input id="boutton" type="submit" name="Valider" value="Valider">
	</div>
</form>
<?php
}	


if(!empty($_POST['nom'])&&!empty($_POST['prenom'])&&!empty($_POST['tel'])
&&!empty($_POST['email'])&&!empty($_POST['login'])&&
!empty($_POST['password']))
{

$personnemanag= new PersonneManager($db);
$_SESSION["numpersonne"]=$personnemanag->AjouterPersonne($_POST['nom'], $_POST["prenom"], $_POST["tel"],
$_POST["email"], $_POST["login"], $_POST["password"] );
}

if(!empty($_POST['nom'])&&!empty($_POST['prenom'])&&!empty($_POST['tel'])
&&!empty($_POST['email'])&&!empty($_POST['login'])&&
!empty($_POST['password'])&&$_POST["role"]=="etudiant")
{?>
	<h2>Ajouter un étudiant</h2>
	<form  method="post">
		<label for="year">Année :</label>
		<select  name="annee">
			<?php
			$divmanag= new DivisionManager($db);
			$listeDivision=$divmanag->getList();
			foreach($listeDivision as $division){
				?>
				<option value="<?php echo $division->getDiv_num() ?>"><?php echo $division->getDiv_nom() ?></option>
		<?php } ?>
		</select>

		<label for="departement">Département :</label>
		<select  name="departement">
			<?php
			$depmanag= new DepartementManager($db);
			$listeDepartement=$depmanag->getList();
			foreach($listeDepartement as $departement){
				?>
				<option value="<?php echo $departement->getDep_num() ?>"><?php echo $departement->getDep_nom() ?></option>
		<?php } ?>
		</select>
		<input type="submit" name="valider" value="Valider">
	</form>

	<?php
}
		if(!empty($_POST['annee'])&&!empty($_POST['departement'])){
			$etudiantmanag= new EtudiantManager($db);
			$result=$etudiantmanag->AjouterEtudiant($_POST['departement'],$_POST['annee']);
		}


		if(!empty($_POST['nom'])&&!empty($_POST['prenom'])&&!empty($_POST['tel'])
		&&!empty($_POST['email'])&&!empty($_POST['login'])&&
		!empty($_POST['password'])&&$_POST["role"]=="personnel")
		{
			?>
			<h2>Ajouter un salarié</h2>
			<form  method="post">
				<label for="telprof">Téléphone professionnel :</label>
				<input type="tel" name="telprof" value="">
				<label for="fonction">Fonction :</label>
				<select  name="fonction" value="">
					<?php
					$fonmanag= new FonctionManager($db);
					$listeFonction=$fonmanag->getList();
					foreach($listeFonction as $fonction){
						?>
						<option value="<?php echo $fonction->getFon_num() ?>"><?php echo $fonction->getFon_libelle() ?></option>
				<?php } ?>
				</select>
				<input type="submit" name="valider" value="Valider">
			</form>
			<?php
		}
if(!empty($_POST['telprof'])&&!empty($_POST['fonction'])){
	$salariemanag= new SalarieManager($db);
	$result=$salariemanag->AjouterSalarie($_POST['telprof'], $_POST['fonction']);
}
?>
