				<h1>Ajouter une personne</h1>

	<form  method="post">
		<label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom"><br>
    <label for="prenom">Prenom :</label>
    <input type="text" id="prenom" name="prenom"><br>
		<label for="tel">Téléphone :</label>
    <input type="tel" id="tel" name="tel"><br>
    <label for="email">Email :</label>
    <input type="email" id="email" name="email"><br>
		<label for="login">Login :</label>
		<input type="text" id="logoin" name="login"><br>
		<label for="password">Mot de passe :</label>
		<input type="password" id="password" name="password"><br>
		<label for="categorie">Catégorie :</label>
		<input type="checkbox" name="Etudiant" value="Etudiant">
		<input type="checkbox" name="Personnel" value="Personnel">
		<input type="submit" name="Valider" value="Valider">

		</select>
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

		$req="insert into ville (per_nom, per_prenom, per_tel,
		 per_mail, per_login, per_pwd) values('$nom','$prenom',
		 '$tel','$email','$login',$password)";
		$result=$db->prepare($req)->execute();
	}

	?>
