<?php

namespace Models;

class Fight {
    private $fighter1;
    private $fighter2;

    public function __construct(Fighter $fighter1, Fighter $fighter2) {
        $this->fighter1 = $fighter1;
        $this->fighter2 = $fighter2;
    }

    // Comparar los luchadores y determinar un ganador
    public function determineWinner() {
        $total1 = $this->fighter1->getTotal();
        $total2 = $this->fighter2->getTotal();

        // Si no hay empate, el luchador con el total más alto gana
        if ($total1 > $total2) {
            return $this->fighter1;
        } elseif ($total1 < $total2) {
            return $this->fighter2;
        } else {
            // En caso de empate, comparar la diferencia entre la habilidad más alta y la más baja
            return $this->compareByAttributes($this->fighter1, $this->fighter2);
        }
    }

    // Función para comparar las habilidades de los luchadores en caso de empate
    private function compareByAttributes(Fighter $fighter1, Fighter $fighter2) {
        $attributes1 = $fighter1->getAttributes();
        $attributes2 = $fighter2->getAttributes();

        $max1 = max($attributes1);
        $min1 = min($attributes1);
        $diff1 = $max1 - $min1;

        $max2 = max($attributes2);
        $min2 = min($attributes2);
        $diff2 = $max2 - $min2;

        // Si la diferencia es mayor en el luchador 1, gana el luchador 1
        if ($diff1 > $diff2) {
            return $fighter1;
        } elseif ($diff1 < $diff2) {
            return $fighter2;
        } else {
            // Si la diferencia es igual, comparar por el ID
            return ($fighter1->id > $fighter2->id) ? $fighter1 : $fighter2;
        }
    }
}
