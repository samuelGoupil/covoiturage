<?php
class Departement{
  private $dep_num;
	private $dep_nom;
	private $vil_num;

	public function __construct($valeurs = array()){
	if (!empty($valeurs))
			//print_r ($valeurs);
			 $this->affecte($valeurs);
		 }
	public function affecte($donnees){
			foreach ($donnees as $attribut => $valeur){
					switch ($attribut){
							case 'dep_num': $this->setDep_num($valeur); break;
							case 'dep_nom': $this->setDep_nom($valeur); break;
							case 'vil_num': $this->setVil_num($valeur); break;
					}
			}
	}

	public function setDep_num($id){
        $this->dep_num=$id;
    }
	public function setDep_nom($id){
	      $this->dep_nom=$id;
	  }
	public function setVil_num($id){
		    $this->vil_num=$id;
		}
  public function getDep_num(){
  		return $this->dep_num;
	}

	public function getDep_nom(){
  		return $this->dep_nom;
	}
  public function getVil_nom(){
      return $this->vil_nom;
  }

}
