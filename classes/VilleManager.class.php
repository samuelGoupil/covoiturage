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
	public function getListVilleParcours(){
		$req="SELECT v.vil_nom FROM VILLE, PARCOURS P INNER JOIN VILLE V ON P.vil_num1=v.vil_num GROUP BY par_num";
		$reqexec=$this->db->query($req);
		while($ville = $reqexec->fetch(PDO::FETCH_OBJ)){
			$listeVilles[] = new Ville($ville);
		}
		$reqexec->closeCursor();
		return $listeVilles;
	}
	public function getListVilleParcours2(){
		$req="SELECT DISTINCT vil_nom FROM VILLE V, PARCOURS P WHERE V.vil_num=P.vil_num2";
		$reqexec=$this->db->query($req);
		while($ville = $reqexec->fetch(PDO::FETCH_OBJ)){
			$listeVilles[] = new Ville($ville);
		}
		$reqexec->closeCursor();
		return $listeVilles;
	}
}
