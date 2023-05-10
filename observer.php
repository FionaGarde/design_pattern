<?php

/*interface AnimalInterface{
	public function attach(ObserverInterface $observer):void;
	public function detach(ObserverInterface $observer):void;
	public function notify():void;
}

interface ObserverInterface{
	public function update(AnimalInterface $animal):void;
}

class Animal implements AnimalInterface{
	private $age;
	private $observer;

	public function attach(ObserverInterface $observer):void{
		$this->observer[] = $observer;
	}

	public function detach(ObserverInterface $observer):void{
		$key = $array_search($observer, $this->observer);

		if(false !== $key){
			unset($this->observer[$key]);
		}
	}

	public function notify():void{
		foreach ($this->observer as $observer) {
			$observer->update($this);
		}
	}

	public function updateAge($string $age): void{
		$this->age = $age;
		$this->notify();
	}

	public function indicateAge(): string{
		return $this->age;
	}

}

Class Observer implements ObserverInterface{
	private $newAge;

	public function update(AnimalInterface $animal): void{
		$this->newAge = $animal->indicateAge();
	}
}*/

interface Observer {
    public function update($data);
}

interface Subject {
    public function attach(Observer $observer);
    public function detach(Observer $observer);
    public function notify($data);
}

class Animal implements Subject{
	private $observers = array();
	private $data;

 public function attach(Observer $observer) {
        $this->observers[] = $observer;
    }

    public function detach(Observer $observer) {
        $key = array_search($observer, $this->observers, true);
        if ($key !== false) {
            unset($this->observers[$key]);
        }
    }

    public function notify($data) {
        foreach ($this->observers as $observer) {
            $observer->update($data);
        }
    }

    public function setData($data) {
        $this->data = $data;
        $this->notify($data);
    }

}

class Race implements Observer{
	public function update($data) {
		echo "L\'animal est un ".$data."\n";
	}
}

class Age implements Observer{
	public function update($data) {
		echo "Il a ".$data."\n";
	}
}

$animal = new Animal();
$race = new Race();
$age = new Age();

$animal->attach($race);
$animal->attach($age);

$animal->setData("Nouvel animal enregistrer");

$animal->detach($age);

$animal->setData("L'âge de l'animal a été mis a jour");

?>