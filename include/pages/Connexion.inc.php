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
    </head>
    <form id="LoginForm" action="#" method="POST">
        <p>
            <label for="login">Nom d'utilisateur :</label>
            <input autocomplete="off" type="text" id="login" name="login" value="" />
        </p>
        <p>
        <label for="motPasse">Mot de passe :</label>
        <input autocomplete="off" type="password" id="motPasse" name="motPasse"/>
        </p>
        <p>
            <input type="submit" value="Connexion" />
        </p>
    </form>
    <?php 

        if (!empty($_POST['login'])){
            $result=$personnemanag->verifpersonne($_POST["login"],$_POST["motPasse"]);
            if(!empty($result)){
                $_SESSION["login"]=$_POST["login"];
                $_SESSION["MotDePasse"]=$_POST["motPasse"];
                $_SESSION["Num"]=$result->getPer_num(); ?>
                <script type='text/javascript'>window.location.href='index.php'</script>
                <?php

            }
            else{
                echo "Pas d'utilisateur trouve";
            }
        }
        ?>
        </body>
</html>
