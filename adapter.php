<?php

/*interface CarAdapter{
	public function car(string $model, string $marque): void;
}

final class ImmatCarAdapter implements CarAdapter{
	public function __construct(private ImmatCarAdapter $immat){

	}

	public function car(string $model, string $marque): void{
		$this->immat->car($model, $marque);
	}
}

$car = new Car(203, 'Peugeot');
$CarAdapter = new CarAdapter($car);*/

interface Car{
	public function kilometrage($km);
}

class StripeRoad{
	public function length($km);
}

class StripAdapter implements Car{
	private $stripeRoad;

	public function __construct(StripeRoad $stripeRoad){
		$this->stripeRoad = $stripeRoad;
	}

	public function kilometrage($km){
		$this->stripeRoad->length($km);
	}
}

$stripeRoad = new stripeRoad();
$stripeRoad = new StripAdapter($stripeRoad);
$stripeRoad->kilometrage(50);

?>