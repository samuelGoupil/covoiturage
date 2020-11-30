<?php
class EtudiantManager{
	public function __construct($db){
		$this->db =$db;
	}

	public function AjouterEtudiant($dep_num, $div_num){
		$per_num="SELECT per_num FROM PERSONNE WHERE per_num>=ALL(SELECT per_num FROM PERSONNE)"
		$req= "INSERT INTO Etudiant (per_num, dep_num, div_num)
		VALUES ('$per_num', '$dep_num', '$div_num')";
		$execetudiant=$this->db->prepare($req)->execute();
		return $execetudiant;
	}
	public function getList(){
		$listeEtudiant=array();
		$sql="Select per_num, dep_num, div_num
		from Etudiant order by per_num";
		$req=$this->db->query($sql);
		while ($etudiant=$req->fetch(PDO::FETCH_OBJ)){
			$listeEtudiant[]=new Etudiant ($etudiant);
		}
		return $listeEtudiant;
		$req->closeCursor();
	}

}
