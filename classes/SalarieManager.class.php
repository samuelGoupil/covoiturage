<?php
class SalarieManager{
	public function __construct($db){
		$this->db =$db;
	}

	public function AjouterSalarie($sal_telprof, $fon_num){
		$per_num=$_SESSION["numpersonne"];
		$req= "INSERT INTO SALARIE (per_num, sal_telprof, fon_num)
		VALUES ('$per_num','$sal_telprof', '$fon_num')";
		$execsalarie=$this->db->prepare($req)->execute();
		return $execsalarie;
	}
	public function SupprimerSalarie($per_num){
		$req= "DELETE FROM SALARIE WHERE per_num='$per_num'" ;
		$execsalarie=$this->db->prepare($req)->execute();
	}

	public function getList(){
		$listeSalarie=array();
		$sql="Select per_num, sal_telprof, fon_num
		from SALARIE order by per_num";
		$req=$this->db->query($sql);
		while ($salarie=$req->fetch(PDO::FETCH_OBJ)){
			$listeSalarie[]=new Salarie ($salarie);
		}
		return $listeSalarie;
		$req->closeCursor();
	}

}
