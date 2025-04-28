public function startTournament($fighters)
{
    $log = '';  // Variable para almacenar el log de combates
    $round = 1;
    $winners = [];

    // Comienza el torneo
    $log .= "=== Tournament Start ===\n";

    // Mientras haya más de un luchador
    while (count($fighters) > 1) {
        $log .= "--- Round $round ---\n";
        $roundWinners = [];

        // Enfrenta a los luchadores
        for ($i = 0; $i < count($fighters); $i += 2) {
            if ($i + 1 < count($fighters)) {
                // Luchador 1 vs Luchador 2
                $fighter1 = $fighters[$i];
                $fighter2 = $fighters[$i + 1];

                $log .= "Fight between: Luchador 1: {$fighter1->name} ({$fighter1->id}) - Strength: {$fighter1->strength}, Endurance: {$fighter1->endurance}, Agility: {$fighter1->agility}, Intelligence: {$fighter1->intelligence}, Mana: {$fighter1->mana} \n";
                $log .= "Luchador 2: {$fighter2->name} ({$fighter2->id}) - Strength: {$fighter2->strength}, Endurance: {$fighter2->endurance}, Agility: {$fighter2->agility}, Intelligence: {$fighter2->intelligence}, Mana: {$fighter2->mana} \n";

                // Logica del combate
                $winner = $this->fight($fighter1, $fighter2);  // Llama a la función de combate
                $log .= "Winner: {$winner->name} ({$winner->id})\n";

                $roundWinners[] = $winner;  // Añadir al ganador de la ronda
            }
        }

        // Avanza los ganadores a la siguiente ronda
        $fighters = $roundWinners;
        $round++;
    }

    // Al final, el ganador final
    $winner = $fighters[0];
    $log .= "--- Tournament Winner ---\n";
    $log .= "--- Champion ---\n";
    $log .= "Fighter {$winner->id} Name: {$winner->name} Strength: {$winner->strength} Endurance: {$winner->endurance} Agility: {$winner->agility} Intelligence: {$winner->intelligence} Mana: {$winner->mana}\n";

    // Imprime los resultados finales (Resumen)
    echo "<div class='results'><pre>{$log}</pre></div>";
}
