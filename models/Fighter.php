<?php

namespace Models;

class Fighter {
    public $id;
    public $name;
    public $strength;
    public $endurance;
    public $agility;
    public $intelligence;
    public $mana;

    public function __construct($id = null) {
        $this->id = $id ?? uniqid();  // Genera un ID único si no se proporciona uno.
        $this->name = $this->generateRandomName();
        $this->strength = rand(1, 5);
        $this->endurance = rand(1, 5);
        $this->agility = rand(1, 5);
        $this->intelligence = rand(1, 5);
        $this->mana = rand(1, 5);
    }

    // Función para generar nombres aleatorios
    private function generateRandomName() {
        $names = ["Adam", "Juan", "Lorenzo", "Pedro", "Luis", "Carlos", "Miguel", "Raul", "Sofia", "Nerea"];
        return $names[array_rand($names)];  // Elige un nombre al azar
    }

    // Obtener el total de los atributos
    public function getTotal() {
        return $this->strength + $this->endurance + $this->agility + $this->intelligence + $this->mana;
    }

    // Función para obtener las habilidades en un array
    public function getAttributes() {
        return [
            'strength' => $this->strength,
            'endurance' => $this->endurance,
            'agility' => $this->agility,
            'intelligence' => $this->intelligence,
            'mana' => $this->mana
        ];
    }
}
