<?php
class Ville{

	private $vil_num;
	private $vil_nom;


	public function __construct($valeurs = array()){
	if (!empty($valeurs))
			//print_r ($valeurs);
			 $this->affecte($valeurs);
}
public function affecte($donnees){
			foreach ($donnees as $attribut => $valeur){
					switch ($attribut){
							case 'vil_num': $this->setVil_num($valeur); break;
							case 'vil_nom': $this->setVil_nom($valeur); break;
					}
			}
	}

	public function setVil_num($id){
        $this->vil_num=$id;
    }

	public function setVil_nom($id){
        $this->vil_nom=$id;
    }

	public function getVil_num(){
		return $this->vil_num;
	}

	public function getVil_nom(){
		return $this->vil_nom;
	}

}
