<?php
class EtudiantManager{
	public function __construct($db){
		$this->db =$db;
	}

	public function AjouterEtudiant($dep_num, $div_num){
		$per_num=$_SESSION["numpersonne"];
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

	public function getEtudiant($per_num){
		$req="SELECT per_num, dep_num, div_num FROM Etudiant WHERE per_num='$per_num'";
		$req=$this->db->query($req);
		$etudiant = $req->fetch(PDO::FETCH_ASSOC);
 		return new Etudiant($etudiant);
	}

}
