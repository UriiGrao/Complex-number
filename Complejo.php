<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Complejo
 *
 * @author UriiGrao
 */
class Complejo {

    private $real;
    private $imag;
    private $igual;

    public function __construct(float $real, float $imag) {
        $this->real = $real;
        $this->imag = $imag;
    }

    public function sumar(Complejo $i) {
        $this->real += $i->real;
        $this->imag += $i->imag;
    }

    public function restar(Complejo $i) {
        $this->real -= $i->real;
        $this->imag -= $i->imag;
    }

    public function multi(Complejo $i) {
        $this->real = $this->real * $i->real - $this->imag * $i->imag;
        $this->imag = $this->real * $i->imag + $this->imag * $i->real;
    }

    public function igualdad(Complejo $i) {
        if ($this->real == $i->real && $this->imag == $i->imag) {
            $this->igual = true;
        } else {
            $this->igual = false;
        }
    }

    public function div(Complejo $i) {
        $this->real = (($this->real * $i->real) + ($this->imag * $i->imag)) / (($i->real * $i->real) + ($i->imag * $i->imag));
        $this->imag = ((-$this->real * $i->imag) + ($this->imag * $i->real)) / (($i->imag * $i->imag) + ($i->real * $i->real));
    }

    function __toString() {
        return $this->real . " / " . $this->imag . "i";
    }

    function __get($name) {
        if ($name == "absoluto") {
            return sqrt(($this->real * $this->real) + ($this->imag * $this->imag));
        }
        return $this->$name;
    }

    function __set($name, $value) {
        if ($name == "real") {
            $this->$name = $value;
        } else {
            throw new Exception('Propiedad desconocida');
        }
        if ($name == "imag") {
            $this->$name = $value;
        } else {
            throw new Exception('Propiedad desconocida');
        }
    }

}

$a = new Complejo(2, 3);
$b = new Complejo(1, 4);

echo $a->real . " / " . $a->imag;
echo "<br>";
echo $b->real . " / " . $b->imag;
echo "<br>";


$a->sumar($b);
echo "<br>";
echo "Suma: " . $a->real . " / " . $a->imag;

$a->restar($b);
echo "<br>";
echo "Resta: " . $a->real . " / " . $a->imag;

$a->multi($b);
echo "<br>";
echo "Multi: " . $a->real . " / " . $a->imag;

$a->div($b);
echo "<br>";
echo "Dividir: " . $a->real . " / " . $a->imag;

$a->igualdad($b);
echo "<br>";
echo "Igualdad: " . $a->igual;

echo "<br>";
echo "tostring: " . $a;

echo "<br>";
echo "absoluto: " . $a->absoluto;
