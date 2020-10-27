<?php
class Parcours{
	
	private $par_num;
	private $par_km;
	private $vil_num1;
	private $vil_num2;
	
	public function __construct($valeurs = array()){
		if (!empty($valeurs))
				//print_r ($valeurs);
				 $this->affecte($valeurs);
	}
	public function affecte($donnees){
		foreach ($donnees as $attribut => $valeur){
				switch ($attribut){
						case 'par_num': $this->setPar_num($valeur); break;
						case 'par_km';  $this->setPar_km($valeur); break;
						case 'vil_num1': $this->setVil_num1($valeur); break;
						case 'vil_num2': $this->setVil_num2($valeur); break;
				}
		}

		public function setPar_num($id){
			$this->par_num=$id;
		}
	
		public function setPar_km($id){
			$this->vil_num2=$id;
		}
		public function getPar_num(){
			return $this->par_num;
		}
	
		public function getPar_km(){
			return $this->par_km;
		}
	

		public function setVil_num1($id){
			$this->vil_num1=$id;
		}
	
		public function setVil_num2($id){
			$this->vil_num2=$id;
		}
		public function getVil_num1(){
			return $this->vil_num1;
		}
	
		public function getVil_num2(){
			return $this->vil_num2;
		}
	
}
}