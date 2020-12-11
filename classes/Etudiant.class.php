<?php
class Etudiant{
	private $per_num;
	private $dep_num;
	private $div_num;

	public function __construct($valeurs = array()){
	if (!empty($valeurs))
			//print_r ($valeurs);
			 $this->affecte($valeurs);
		 }
	public function affecte($donnees){
			foreach ($donnees as $attribut => $valeur){
					switch ($attribut){
							case 'per_num': $this->setPer_num($valeur); break;
							case 'dep_num': $this->setDep_num($valeur); break;
							case 'div_num': $this->setDiv_num($valeur); break;
					}
			}
	}

	public function setPer_num($id){
        $this->per_num=$id;
    }
	public function setDep_num($id){
	      $this->dep_num=$id;
	  }
	public function setDiv_num($id){
		    $this->div_num=$id;
		}

		public function getPer_num(){
			return $this->per_num;
		}

		public function getDep_num(){
			return $this->dep_num;
		}

		public function getDiv_num(){
			return $this->div_num;
		}
}
