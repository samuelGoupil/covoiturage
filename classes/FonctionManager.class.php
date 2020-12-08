<?php
class FonctionManager{
	public function __construct($db){
		$this->db =$db;
	}

	public function AjouterFonction($fon_num, $fon_libelle){
		$req= "INSERT INTO fonction (fon_num, fon_libelle)
		VALUES ('$fon_num','$fon_libelle')";
		echo $req;
		$execfonction=$this->db->prepare($req)->execute();
		return $execfonction;
	}
	public function getList(){
		$listeFonction=array();
		$sql="Select fon_num, fon_libelle
		from fonction order by fon_num";
		$req=$this->db->query($sql);
		while ($fonction=$req->fetch(PDO::FETCH_OBJ)){
			$listeFonction[]=new Fonction ($fonction);
		}
		return $listeFonction;
		$req->closeCursor();
	}
}
