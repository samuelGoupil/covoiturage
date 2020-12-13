<?php
class ProposeManager{
	private $db;
	
	public function __construct($db) {
    	$this->db = $db;
	}
		public function AjouterTrajet($par_num, $per_num, $pro_date, $pro_time, $pro_place, $pro_sens){
		$req= "INSERT INTO propose (par_num, per_num, pro_date, pro_time, pro_place, pro_sens) VALUES ('$par_num', '$per_num', '$pro_date', '$pro_time', '$pro_place', '$pro_sens')";
		$execparcours =$this->db->prepare($req)->execute();
		return $execparcours;
	}	
	public function getListPropose(){
		$req="SELECT * FROM PROPOSE";
		$reqexec= $this->db->query($req);
		while($propose= $reqexec->fetch(PDO::FETCH_OBJ)){
			$listePropose[]=new Propose($propose);
		}
		$reqexec->closeCursor();
		return $listePropose;

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
	public function getAllVillesPropose(){
		$req = 'SELECT DISTINCT par_num FROM PARCOURS WHERE par_num IN (SELECT par_num FROM PROPOSE)';
		$reqexe = $this->db->query($req);
		/*$reqexe-> bindValue(':vil_num1', $vilnum);*/
		while($parcours= $reqexe->fetch(PDO::FETCH_OBJ)){
			$listeParcours[]=new Parcours($parcours);
		}
		$reqexe->closeCursor();
		return $listeParcours;

	}
	public function rechercheTrajet($par_num, $date, $precision, $heuredep){
		$req = "SELECT DISTINCT * FROM PROPOSE WHERE par_num='$par_num' AND pro_date='$date' AND pro_time>'$heuredep'";
		$reqexe = $this->db->prepare($req);
		$reqexe->execute();

		$ListePropose = array();
		while ($propose = $reqexe->fetch(PDO::FETCH_OBJ)){
			var_dump($propose);
			$ListePropose[]=new Propose($propose);
		}
		$reqexe->closeCursor();
		return $ListePropose;
	}

}