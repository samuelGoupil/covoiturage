<link rel="stylesheet" href="/css/stylesheet.css"/>
	<?php
	$db= new Mypdo();
//	$personne= new PersonneManager($db);

	if(empty($_POST['nom'])&&empty($_POST['prenom'])&&empty($_POST['tel'])
&&empty($_POST['email'])&&empty($_POST['login'])&&
empty($_POST['password'])){
	?>
<h1>Ajouter une personne</h1>
	<form  method="post">
		<div id="right">
			<label for="prenom">Prenom :</label>
	    <input type="text" id="prenom" name="prenom"><br>
			<label for="email">Email :</label>
	    <input type="email" id="email" name="email"><br>
			<label for="password">Mot de passe :</label>
			<input type="password" id="password" name="password"><br>
		</div>

		<div id="left">
			<label for="nom">Nom :</label>
	    <input type="text" id="nom" name="nom"><br>
			<label for="tel">Téléphone :</label>
	    <input type="tel" id="tel" name="tel"><br>
			<label for="login">Login :</label>
			<input type="text" id="logoin" name="login"><br><br>
		</div>

		<div id="center">
			<label for="categorie">Catégorie :</label>
			<input type="radio" name="role" value="etudiant">
			<label for="Etudiant">Etudiant</label>
			<input type="radio" name="role" value="personnel">
			<label for="Personnel">Personnel</label><br><br>
			<input type="submit" name="Valider" value="Valider">
		</div>
	</form>

	<?php
}


	if(!empty($_POST['nom'])&&!empty($_POST['prenom'])&&!empty($_POST['tel'])
&&!empty($_POST['email'])&&!empty($_POST['login'])&&
!empty($_POST['password'])){
	$personnemanag= new PersonneManager($db);
	$_SESSION["numpersonne"]=$personnemanag->AjouterPersonne($_POST['nom'], $_POST["prenom"], $_POST["tel"],
	$_POST["email"], $_POST["login"], $_POST["password"] );

		if (!empty($_POST['role'])){
			$role=$_POST['role'];
			echo $role;

			if($role=="etudiant"){?>
				<h2>Ajouter un étudiant</h2>
				<form  method="post">
					<label for="year">Année :</label>
					<select  name="annee" value="Année 1">
						<option value="1">Année 1</option>
						<option value="2">Année 2</option>
						<option value="3">Année spéciale</option>
						<option value="4">Licence professionnelle</option>
					</select>
					<label for="departement">Département :</label>
					<select  name="departement" value="">
						<option value="???">Génie civil</option>
						<option value="???">Informatique</option>
						<option value="???">GEA</option>
					</select>
					<input type="submit" name="valider" value="Valider">
				</form>
				<?php
				if(empty($_POST['annee'])&&empty($_POST['departement'])){
					echo "qqch";
					$etudiantmanag= new EtudiantManager($db);
					$result=$etudiantmanag->AjouterEtudiant($_POST["departement"],$_POST['anne']);
					echo "L'étudiant a été ajouté.";
				}
			}


			if($role=="personnel"){
				?>
				<h2>Ajouter un salarié</h2>
				<form  method="post">
					<label for="telprof">Téléphone professionnel :</label>
					<input type="tel" name="telprof" value="">
					<label for="fonction">Fonction :</label>
					<select  name="fonction" value="">
						<option value="1">Directeur</option>
						<option value="2">Chef de departement</option>
						<option value="3">Technicien</option>
						<option value="4">Secrétaire</option>
						<option value="5">Ingénieur</option>
						<option value="6">Imprimeur</option>
						<option value="7">Enseignant</option>
						<option value="8">Chercheur</option>
					</select>
					<input type="submit" name="valider" value="Valider">
				</form>
				<?php

				if(empty($_POST['telprof'])&&empty($_POST['fonction'])){
					$salariemanag= new SalarieManager($db);
					$result=$salariemanag->AjouterSalarie($_POST['telprof'], $_POST['fonction']);
					echo "Le salarie a été ajouté.";
				}
			}
		}
	}?>
