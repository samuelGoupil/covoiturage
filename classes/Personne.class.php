<?php
class Personne{

	private $per_num;
	private $per_nom;
	private $per_prenom;
	private $per_tel;
	private $per_mail;
	private $per_login;
	private $per_pwd;


	public function __construct($valeurs = array()){
	if (!empty($valeurs))
			//print_r ($valeurs);
			 $this->affecte($valeurs);
}
	public function affecte($donnees){
			foreach ($donnees as $attribut => $valeur){
					switch ($attribut){
							case 'per_num': $this->setPer_num($valeur); break;
							case 'per_nom': $this->setPer_nom($valeur); break;
							case 'per_prenom': $this->setPer_prenom($valeur); break;
							case 'per_tel': $this->setPer_tel($valeur); break;
							case 'per_email': $this->setPer_email($valeur); break;
							case 'per_login': $this->setPer_login($valeur); break;
							case 'per_pwd': $this->setPer_pwd($valeur); break;
					}
			}
	}

	public function setPer_num($id){
        $this->per_num=$id;
    }

	public function setPer_nom($id){
        $this->per_nom=$id;
    }

	public function setPer_prenom($id){
	      $this->per_prenom=$id;
	  }

	public function setPer_tel($id){
	      $this->per_tel=$id;
	  }

		public function setPer_mail($id){
	        $this->per_mail=$id;
	    }

	public function setPer_login($id){
		   	$this->per_login=$id;
		  }

	public function setPer_pwd($id){
		     $this->per_pwd=$id;
		 }




	public function getPer_num(){
		return $this->per_num;
	}

	public function getPer_nom(){
		return $this->per_nom;
	}

	public function getPer_prenom(){
		return $this->per_prenom;
	}

	public function getPer_tel(){
		return $this->per_tel;
	}

	public function getPer_mail(){
		return $this->per_mail;
	}

	public function getPer_login(){
		return $this->per_login;
	}

	public function getPer_pwd(){
		return $this->per_pwd;
	}

}
