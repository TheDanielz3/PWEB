<?php

class ModeloCalculadora {

    public function Soma($valor1, $valor2) {
        return $valor1 + $valor2;
    }

    public function Subtracao($valor1, $valor2) {
        return $valor1 - $valor2;
    }

    public function Multiplicacao($valor1, $valor2) {
        return $valor1 * $valor2;
    }

    public function Divisao($valor1, $valor2) {
        return $valor1 / $valor2;
    }
}