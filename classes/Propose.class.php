<?php
class Propose{
	
	private $par_num;
	private $per_num;
	private $pro_date;
	private $pro_time;
	private $pro_place;
	private $pro_sens;
	
	public function __construct($valeurs = array()){
		if (!empty($valeurs))
				//print_r ($valeurs);
				 $this->affecte($valeurs);
	}
	public function affecte($donnees){
		foreach ($donnees as $attribut => $valeur){
				switch ($attribut){
						case 'par_num': $this->setPar_num($valeur); break;
						case 'per_num';  $this->setPer_num($valeur); break;
						case 'pro_date': $this->setPro_date($valeur); break;
						case 'pro_time': $this->setPro_time($valeur); break;
						case 'pro_place': $this->setPro_place($valeur); break;
						case 'pro_sens': $this->setPro_sens($valeur); break;
				}
		}
	}

	public function setPar_num($id){
		$this->par_num=$id;
	}

	public function setPer_num($id){
		$this->par_km=$id;
	}
	public function setPro_date($id){
		$this->par_num=$id;
	}

	public function setPro_time($id){
		$this->par_km=$id;
	}
	public function setPro_place($id){
		$this->vil_num1=$id;
	}

	public function setPro_sens($id){
		$this->vil_num2=$id;
	}
	public function getPar_num(){
		return $this->par_num;
	}
	public function getPer_num(){
		return $this->par_num;
	}
	public function getPro_date(){
		return $this->par_num;
	}
	public function getPro_time(){
		return $this->par_km;
	}

	public function getPro_place(){
		return $this->vil_num1;
	}
	public function getPro_sens(){
		return $this->vil_num2;
	}
	
}