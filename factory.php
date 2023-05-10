<?php

/*class Cours{
	private $cours;

	public function __construct($cours){
		$this->cours = $cours;
	}

	public function Name()
	{
		return 'Matiere'.$this->cours;
	}
}

class CoursFactory{
	public static function create($cours){
		return new Matiere($cours);
	}
}

$histoire = CoursFactory::create('Histoire');*/

interface Cours{
	public function cours($matiere);
}

class Horaire implements Cours{
	public function cours($matiere){
		
	}
}

class NameProfesseur implements Cours{
	public function cours($matiere){
		
	}
}

class CoursFactory{
	public function createCours($method){
		switch ($method){
			case 'horaire' :
				return new Horaire();

			case 'professeur':
				return new NameProfesseur();

			default:
				throw new Exception('Cours pas encore existant');
		}
	}
}

$coursFactory = new CoursFactory();
$cours = $coursFactory->createCours('horaire');
$cours->cours('14h-15h');



?>