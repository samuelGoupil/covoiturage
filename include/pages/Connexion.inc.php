<h1>Pour vous connecter</h1>
<?php
$db= new Mypdo();
$personnemanag= new PersonneManager($db);
?>

<html lang="fr">
    <head>
    <title>HTML5 l'autocomplete attribut</title>
    <meta charset="utf-8">
    <meta name="Keywords" content="HTML, CSS"/>
    <meta name="Description" content="HTML"/>
    <form id="LoginForm" action="Connexion.php" method="POST">
        <p>
            <label for="login">Nom d'utilisateur :</label>
            <input autocomplete="off" type="text" id="login" name="login" value="" />
        </p>
        <p>
        <label for="motPasse">Mot de passe :</label>
        <input autocomplete="off" type="text" id="motPasse" name="motPasse"/>
        </p>
        <p>
            <input type="submit" value="Connexion" />
        </p>
    </form>
    <?php 


    if (!empty($_POST['login'])){
        $login=$_POST["login"];
        $motPasse=$_POST["motPasse"];
        echo $login;
        $req = $bdd->prepare("SELECT per_login, per_pwd FROM personne WHERE per_login =$login AND per_pwd= $per_pwd");
        $req->execute(array(
        'pseudo' => $pseudo));
        $resultat = $req->fetch();
        ?>
        </body>
</html>