<?php //A COMPLETER
class DivisionManager{
	public function __construct($db){
		$this->db =$db;
	}

	public function DivisionEtudiant($div_num, $div_nom){
		$req= "INSERT INTO Division (div_num, div_nom)
		VALUES ('$div_num','$div_nom')";
		echo $req;
		$execdivision=$this->db->prepare($req)->execute();
		return $execdivision;
	}
	public function getList(){
		$listeDivision=array();
		$sql="Select div_num, div_nom
		from Division order by div_num";
		$req=$this->db->query($sql);
		while ($division=$req->fetch(PDO::FETCH_OBJ)){
			$listeDivision[]=new Division ($division);
		}
		return $listeDivision;
		$req->closeCursor();
	}
}
