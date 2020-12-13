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
		$reqexe= $this->db->prepare($req);
		$reqexe->execute();
		$listeParcours=array();
		while($parcours= $reqexe->fetch(PDO::FETCH_OBJ)){
			$listeParcours[]=new Parcours($parcours);
		}
		$reqexe->closeCursor();
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
	public function getAllVillesParcours(){
		$req = 'SELECT DISTINCT vil_num, vil_nom FROM ville WHERE vil_num IN (SELECT vil_num1 FROM parcours) OR 
				vil_num IN (SELECT vil_num2 FROM parcours)';
		$reqexe = $this->db->prepare($req);
		/*$reqexe-> bindValue(':vil_num1', $vilnum);*/
		$reqexe->execute();

		$ListeVilles = array();
		while ($villes = $reqexe->fetch(PDO::FETCH_OBJ)){
			$ListeVilles[]=new Ville($villes);
		}
		$reqexe->closeCursor();
		return $ListeVilles;
	}
	public function getAllParcours($vilnum){
		$req = "SELECT DISTINCT vil_num, vil_nom FROM ville WHERE vil_num IN (SELECT vil_num1 FROM PARCOURS WHERE vil_num2 ='$vilnum') OR 
				vil_num IN (SELECT vil_num2 FROM parcours WHERE vil_num1='$vilnum')";
		$reqexe = $this->db->prepare($req);
		$reqexe->execute();

		$ListeVilles = array();
		while ($villes = $reqexe->fetch(PDO::FETCH_OBJ)){
			var_dump($villes);
			$ListeVilles[]=new Ville($villes);
		}
		$reqexe->closeCursor();
		return $ListeVilles;
	}
	public function getNumVilles($vil_num1, $vil_num2){
		$req= "SELECT * FROM parcours WHERE vil_num1='$vil_num1' AND vil_num2='$vil_num2'";
		$req=$this->db->query($req);
		while($parcours= $req->fetch(PDO::FETCH_OBJ)){
			$listeParcours[]=new Parcours($parcours);
		}
		return $listeParcours;
		$req->closeCursor();
	}
	public function getAllParcoursNum($par_num){
		$req = "SELECT DISTINCT vil_num, vil_nom FROM ville WHERE vil_num IN (SELECT vil_num1 FROM PARCOURS WHERE par_num='$par_num') OR 
				vil_num IN (SELECT vil_num2 FROM parcours WHERE par_num='$par_num')";
		$req=$this->db->query($req);
		while($villes= $req->fetch(PDO::FETCH_OBJ)){
			$listeVilles[]=new Ville($villes);
		}
		return $listeVilles;
		$req->closeCursor();
	}
	public function getAllParcoursNumero($par_num){
		$req = "SELECT DISTINCT vil_num, vil_nom FROM ville WHERE vil_num IN (SELECT vil_num1 FROM PARCOURS WHERE par_num='$par_num') OR 
				vil_num IN (SELECT vil_num2 FROM parcours WHERE par_num='$par_num')";
		$req=$this->db->query($req);
		while($parcours= $req->fetch(PDO::FETCH_OBJ)){
			$listeParcours[]=new Parcours($villes);
		}
		return $listeParcours;
		$req->closeCursor();
	}
}
	