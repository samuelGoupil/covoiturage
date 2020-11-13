<?php
class VilleManager{


	public function __construct($db){
		$this->db =$db;
	}

	public function getList(){
		$listeVille=array();
		$sql="Select vil_num, vil_nom from ville order by vil_num";
		$req=$this->db->query($sql);
		while ($ville=$req->fetch(PDO::FETCH_OBJ)){
			$listeVille[]=new Ville ($ville);
		}
		return $listeVille;
		$req->closeCursor();
	}

	public function getVilleByID($id){
		$req="SELECT * FROM VILLE V WHERE V.vil_num=$id";
		$reqexec=$this->db->query($req);
		while($ville = $reqexec->fetch(PDO::FETCH_OBJ)){
			$villeRetour = new Ville($ville);
		}
		$reqexec->closeCursor();
		return $villeRetour;
		
	}
	
}
