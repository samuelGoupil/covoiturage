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
		$reqexec= $this->db->query($req);
		while($parcours= $reqexec->fetch(PDO::FETCH_OBJ)){
			$listeParcours[]=new Parcours($parcours);
		}
		$reqexec->closeCursor();
		return $listeParcours;
	}
	public function getAllParcours($vilnum){
		$req = 'SELECT DISTINCT vil_num, vil_nom FROM ville WHERE vil_num IN (SELECT vil_num1 FROM PARCOURS WHERE vil_num2 = :vil_num1 ) OR 
				vil_num IN (SELECT vil_num2 FROM parcours WHERE vil_num1= :vil_num1)';
		$reqexe = $this->db->prepare($sql);
		$reqexe-> bindValue(':vil_num1', $vilnum);
		$reqexe->execute();

		$ListeVilles = array();
		while ($villes = $reqexe->fetch(PDO::FETCH_OBJ)){
			$ListeVilles[]=new Ville($villes);
		}
		$requete->closeCursor();
		return $ListeVilles;
	}

}
	