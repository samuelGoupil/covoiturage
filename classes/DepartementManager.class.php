<?php //A COMPLETER
class DepartementManager{
	public function __construct($db){
		$this->db =$db;
	}

	public function AjouterDepartement($dep_nom, $vil_num){
		$req= "INSERT INTO departement (dep_nom, vil_num)
		VALUES ('$dep_nom','$vil_num')";
		echo $req;
		$execdepartement=$this->db->prepare($req)->execute();
		return $execdepartement;
	}
	public function getList(){
		$listeDepartement=array();
		$sql="Select dep_num, dep_nom, vil_num
		from departement order by dep_num";
		$req=$this->db->query($sql);
		while ($departement=$req->fetch(PDO::FETCH_OBJ)){
			$listeDepartement[]=new Departement ($departement);
	}
		return $listeDepartement;
		$req->closeCursor();
	}

	public function getDepartement($dep_num){
		$req="SELECT dep_num,dep_nom, vil_num FROM Departement WHERE dep_num='$dep_num'";
		$req=$this->db->query($req);
		$departement = $req->fetch(PDO::FETCH_ASSOC);
		return new Departement($departement);
	}
}
