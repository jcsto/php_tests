<?php


Class Carro {
	
	public $contador = 0;
	public static $contadorEstatico = 0;
	
	public function getCount() {
		$this->contador++;
		echo "El contador es: " . $this->contador . '<br />';
	}
	
	public static function getCountStatic() {
		self::$contadorEstatico++;
		echo "El contador estatico es: " . self::$contadorEstatico . '<br />';
		
	}
	
	
}

$carro = new Carro;
$carro->getCount();
Carro::getCountStatic();

// Nueva instancia
echo '<br /><b>Nueva instancia del objeto: </b><br /><br />';

$carro = new Carro;
$carro->getCount();
Carro::getCountStatic();
