<?php
// controllers/TournamentController.php
namespace Controllers;

require_once __DIR__ . '/../models/Fighter.php';
require_once __DIR__ . '/../models/Fight.php';

use Models\Fighter;
use Models\Fight;

class TournamentController {
    public function startTournament() {
        $fighters = [];
        $log = "<div class='log-entry tournament-start'>"; // Comienza el contenedor del torneo

        // Crear 8 luchadores con atributos aleatorios
        for ($i = 0; $i < 8; $i++) {
            $fighters[] = new Fighter();
        }

        // Iniciar las rondas
        $this->startRounds($fighters, $log);

        $log .= "</div>"; // Cierra el contenedor
        return $log;
    }

    private function startRounds($fighters, &$log) {
        $round = 1;
        $log .= "<div class='round-entry'>";
        $log .= "<h2>=== Torneo Iniciado ===</h2><br><br>";

        while (count($fighters) > 1) {
            $log .= "<h3>--- Ronda $round ---</h3><br>";
            $fighters = $this->playRound($fighters, $log);
            $round++;
        }

        // El campeón final
        $log .= "<h3>--- Campeón del Torneo ---</h3><br>";
        $this->displayFighter($fighters[0], $log);

        $log .= "</div>"; // Cierra el bloque de la ronda
    }

    private function playRound($fighters, &$log) {
        $winners = [];

        for ($i = 0; $i < count($fighters); $i += 2) {
            $fighter1 = $fighters[$i];
            $fighter2 = $fighters[$i + 1];

            $log .= "<div class='fight-entry'>";
            $this->displayFightInfo($fighter1, $fighter2, $log);

            $fight = new Fight($fighter1, $fighter2);
            $winner = $fight->determineWinner();

            $log .= "<p><strong>Ganador:</strong> {$winner->name} (#{$winner->id})</p>";
            $log .= "</div>";

            $winners[] = $winner;
        }

        return $winners;
    }

    private function displayFightInfo($fighter1, $fighter2, &$log) {
        $log .= "<div class='fighter-info'>";
        $log .= "<p><strong>Luchador 1:</strong> {$fighter1->name} (#{$fighter1->id})</p>";
        $log .= "<p>STR: {$fighter1->strength}, END: {$fighter1->endurance}, AGI: {$fighter1->agility}, INT: {$fighter1->intelligence}, MANA: {$fighter1->mana}</p>";
        $log .= "<br>";
        $log .= "<p><strong>Luchador 2:</strong> {$fighter2->name} (#{$fighter2->id})</p>";
        $log .= "<p>STR: {$fighter2->strength}, END: {$fighter2->endurance}, AGI: {$fighter2->agility}, INT: {$fighter2->intelligence}, MANA: {$fighter2->mana}</p>";
        $log .= "</div>";
    }

    private function displayFighter($fighter, &$log) {
        $log .= "<div class='fighter-details'>";
        $log .= "<p><strong>Nombre:</strong> {$fighter->name}</p>";
        $log .= "<p>STR: {$fighter->strength}, END: {$fighter->endurance}, AGI: {$fighter->agility}, INT: {$fighter->intelligence}, MANA: {$fighter->mana}</p>";
        $log .= "</div>";
    }
}
