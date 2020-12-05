<?php
class ParcoursManager{
	private $db;
	
	public function __construct($db) {
    	$this->db = $db;
    }
	public function AjouterParcours($par_km, $ville1, $ville2){
		$req= "INSERT INTO parcours (par_km, vil_num1, vil_num2) VALUES ('$par_km', '$ville1', '$ville2')";
		$execparcours =$this->db->prepare($req)->execute();
		return $execparcours;
	}
	public function getListParcours(){
		$req="SELECT * FROM PARCOURS";
		$reqexec= $this->db->query($req);
		while($parcours= $reqexec->fetch(PDO::FETCH_OBJ)){
			$listeParcours[]=new Parcours($parcours);
		}
		$reqexec->closeCursor();
		return $listeParcours;

	}
	public function getListeParcours(){
		$req="SELECT vil_nom FROM PARCOURS";
		$reqexec= $this->db->query($req);
		while($parcours= $reqexec->fetch(PDO::FETCH_OBJ)){
			$listeParcours[]=new Parcours($parcours);
		}
		$reqexec->closeCursor();
		return $listeParcours;

	}
	public function getVilleCompatible($vil_num){
		$req= "SELECT * FROM parcours WHERE vil_num1=$vil_num";
		$execparcours =$this->db->prepare($req)->execute();
		return $execparcours;
	}

}
	