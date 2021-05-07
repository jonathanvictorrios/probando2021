<?php
class Calculadora {

    // Atributos
    private $n1;
    private $n2;

    // Constructores
    public function __construct ($n1, $n2){
        $this -> n1 = $n1;
        $this -> n2 = $n2; 
    }

    // Metodos
    public function getNumero1(){
		return $this->n1;
	}

	public function setN1($n1){
		$this->n1 = $n1;
	}

	public function getNumero2(){
		return $this->n2;
	}

	public function setN2($n2){
		$this->n2 = $n2;
	}

    public function sumar (){
        $suma = $this -> getNumero1() + $this -> getNumero2();
        return $suma;
    }
    public function restar (){
        $resta = $this -> getNumero1() - $this -> getNumero2();
        return $resta;
    }

    public function multiplicar (){
        $producto = $this -> getNumero1() * $this -> getNumero2();
        return $producto;
    }

    public function dividir (){
        $cociente = $this -> getNumero1() / $this -> getNumero2();
        return $cociente;
    }
    public function __toString(){
        return "El resultado de las operaciones entre ".$this -> getNumero1()." y ".$this -> getNumero2()." son: \n\t● Suma —→ ".$this -> sumar()."\n\t● Resta —→ ".$this -> restar()."\n\t● Producto —→ ". $this -> multiplicar()."\n\t● Cociente —→ ".$this -> dividir();
    }
}
?>