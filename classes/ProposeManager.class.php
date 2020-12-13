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

}