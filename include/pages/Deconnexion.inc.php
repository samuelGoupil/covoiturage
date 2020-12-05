
	<h1>Pour vous deconnecter</h1>
    <?php unset($_SESSION["login"]);
    unset($_SESSION["MotDePasse"]);
    echo "Vous êtes deconnecté !"; ?>