<?php
class Salarie{
	private $per_num;
	private $sal_telprof;
	private $fon_num;

	public function __construct($valeurs = array()){
	if (!empty($valeurs))
			//print_r ($valeurs);
			 $this->affecte($valeurs);
		 }
	public function affecte($donnees){
			foreach ($donnees as $attribut => $valeur){
					switch ($attribut){
							case 'per_num': $this->setPer_num($valeur); break;
							case 'sal_telprof': $this->setSal_telprof($valeur); break;
							case 'fon_num': $this->setFon_num($valeur); break;
					}
			}
	}

	public function setPer_num($id){
        $this->per_num=$id;
    }
	public function setSal_telprof($id){
	      $this->sal_telprof=$id;
	  }
	public function setFon_num($id){
		    $this->fon_num=$id;
		}

	public function getPer_num(){
		return $this->per_num;
	}
	public function getSal_telprof(){
		return $this->sal_telprof;
	}
	public function getFon_num(){
		return $this->fon_num;
	}

}
