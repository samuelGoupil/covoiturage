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
}
