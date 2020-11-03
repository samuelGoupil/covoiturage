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
	public function getListVilleParcours($ville1,$ville2){
		$req="SELECT * FROM VILLE V, PARCOURS P WHERE V.vil_num=P.vil_num1 UNION SELECT * FROM VILLE V, PARCOURS P WHERE V.vil_num=P.vil_num2 GROUP BY vil_num";
		$reqexec=$this->db->query($req);
		while($ville = $reqexec->fetch(PDO::FETCH_OBJ)){
			$listeVilles[] = new Ville($ville);
		}
		$reqexec->closeCursor();
		return $listeVilles;
	}
	public function countParcours(){
		$req="SELECT COUNT(*) FROM PARCOURS";
		$reqexec=$this->db->query($req);
		$reqexec->closeCursor();
		return $reqexec;
	}
}
	