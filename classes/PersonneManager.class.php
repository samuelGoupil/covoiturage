<?php
class PersonneManager{
	public function __construct($db){
		$this->db =$db;
	}
	
	public function getList(){
		$listePersonne=array();
		$sql="Select per_num, per_nom, per_prenom
		from personne order by per_num";
		$req=$this->db->query($sql);
		while ($personne=$req->fetch(PDO::FETCH_OBJ)){
			$listePersonne[]=new Personne ($personne);
		}
		return $listePersonne;
		$req->closeCursor();
	}
	public function verifpersonne($login,$pwd){
		$req="SELECT * FROM PERSONNE WHERE per_login='$login' AND per_pwd='$pwd'";
		$reqexe=$this->db->prepare($req)->execute();
		return $reqexe;
	}
}
