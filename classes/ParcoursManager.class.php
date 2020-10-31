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
}
	