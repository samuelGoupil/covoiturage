				<h1>Ajouter une personne</h1>
<link rel="stylesheet" href="/css/stylesheet.css"/>
	<?php
	$db= new Mypdo();
	$personne= new PersonneManager($db);
	?>
	<form  method="post">
		<div id="right">
			<label for="password">Mot de passe :</label>
			<input type="password" id="password" name="password"><br>
			<label for="email">Email :</label>
	    <input type="email" id="email" name="email"><br>
			<label for="prenom">Prenom :</label>
	    <input type="text" id="prenom" name="prenom"><br>
		</div>

		<div id="left">
			<label for="nom">Nom :</label>
	    <input type="text" id="nom" name="nom"><br>
			<label for="tel">Téléphone :</label>
	    <input type="tel" id="tel" name="tel"><br>
			<label for="login">Login :</label>
			<input type="text" id="logoin" name="login"><br>
		</div>

		<div id="center">
			<label for="categorie">Catégorie :</label>
			<input type="checkbox" name="Etudiant">
			<label for="Etudiant">Etudiant</label>
			<input type="checkbox" name="Personnel">
			<label for="Personnel">Personnel</label><br>
			<input type="submit" name="Valider" value="Valider">
		</div>
	</form>

	<?php



	if(!empty($_POST['nom'])&&!empty($_POST['prenom'])&&!empty($_POST['tel'])
&&!empty($_POST['email'])&&!empty($_POST['login'])&&
!empty($_POST['password'])){
		$nom=$_POST["nom"];
		$prenom=$_POST["prenom"];
		$tel=$_POST["tel"];
		$email=$_POST["email"];
		$login=$_POST["login"];
		$password=$_POST["password"];

		$req="insert into personne (per_nom, per_prenom, per_tel,
		 per_mail, per_login, per_pwd) values('$nom','$prenom',
		 '$tel','$email','$login','$password')";
		$result=$db->prepare($req)->execute();
	}else{
	 		echo 'Veuillez renseigner tous les champs';
	}

	if (empty($_POST['Etudiant'])&&empty($_POST['Personnel'])){
		echo 'veuillez choisir une catégorie';
	}
	if (!empty($_POST['Etudiant'])&&!empty($_POST['Personnel'])){
		echo 'veuillez choisir une seule catégorie';
	}
	if (!empty($_POST['Etudiant'])&&empty($_POST['Personnel'])){
		?>
		<h2>Ajouter un étudiant</h2>
		<form  method="post">
			<label for="year">Année :</label>
			<select  name="annee" value="Année 1">
				<option value="Année 1">Année 1</option>
				<option value="Année 2">Année 2</option>
				<option value="Année spéciale">Année spéciale</option>
				<option value="Licence Professionnelle"></option>
			</select>
			<label for="departement">Département :</label>
			<select  name="departement" value="">
				<option value="Génie civil">Génie civil</option>
				<option value="Informatique">Informatique</option>
				<option value="GEA">GEA</option>
			</select>
			<input type="submit" name="valider" value="Valider">
		</form>
		<?php
		if(!empty($_POST['annee'])&&!empty($_POST['departement'])){
			$anne=$_POST['annee'];
			$departement=$_POST['departement'];
			$r1="select div_num from division where div_nom='$anne'";
			$r2="select dep_num from departement where dep_nom='$departement'";
			$r0='select per_num from personne
			where per_num >=ALL(select per_num from personne)';
			$req="insert into etudiant (per_num, dep_num, div_num)
			values ('$r0','$r1','$r2')";
			$result=$db->prepare($req)->execute();
			echo "L'étudiant a été ajouté.";
		}
	}




	?>
