Fist Of Legends (FOL)

Fist Of Legends es un proyecto que simula un torneo de luchadores donde cada combatiente posee atributos como fuerza, resistencia, agilidad, inteligencia y maná.
El sistema enfrenta a los luchadores en combates uno contra uno hasta que un único campeón emerge.

Características principales

Torneo automático: Los luchadores se enfrentan en rondas eliminatorias.

Atributos detallados: Cada luchador tiene estadísticas que influyen en el resultado de cada pelea.

Log de combates: Se genera un resumen de cada combate y se muestra al final el campeón del torneo.


Estructura del torneo

1. Inicio: Se listan los luchadores participantes.


2. Rondas: Cada ronda enfrenta luchadores de dos en dos.


3. Ganadores: Solo los ganadores avanzan a la siguiente ronda.


4. Final: Se declara al campeón del torneo.



Fragmento del Controlador de Combate

public function startTournament($fighters) {
    $log = '';
    $round = 1;

    $log .= "=== Tournament Start === ";

    while (count($fighters) > 1) {
        $log .= "--- Round $round --- ";
        $roundWinners = [];

        for ($i = 0; $i < count($fighters); $i += 2) {
            if ($i + 1 < count($fighters)) {
                $fighter1 = $fighters[$i];
                $fighter2 = $fighters[$i + 1];

                $log .= "Fight between: Luchador 1: {$fighter1->name} ({$fighter1->id}) ... ";
                $log .= "Luchador 2: {$fighter2->name} ({$fighter2->id}) ... ";

                $winner = $this->fight($fighter1, $fighter2);
                $log .= "Winner: {$winner->name} ({$winner->id}) ";

                $roundWinners[] = $winner;
            }
        }

        $fighters = $roundWinners;
        $round++;
    }

    $winner = $fighters[0];
    $log .= "--- Champion --- ";
    $log .= "Fighter {$winner->id} Name: {$winner->name} ... ";

    echo "<div class='results'><pre>{$log}</pre></div>";
}

Requisitos

PHP 7.4 o superior

Servidor local (XAMPP, MAMP, o similar)


Cómo ejecutar el proyecto

1. Clona el repositorio:

git clone https://github.com/DavidTorres91/FistOfLegends.git


2. Coloca el proyecto en tu carpeta pública (ej: htdocs/ en XAMPP).


3. Asegúrate de tener un servidor web corriendo.


4. Accede a la ruta del proyecto desde tu navegador.



Próximas mejoras

Sistema de habilidades especiales basado en maná.

Diferentes tipos de torneos (por equipos, eliminación doble, etc.).

Implementar niveles y evolución de luchadores.


Autor

Aníbal David Panameño Torres
Desarrollador FullStack | Apasionado por el desarrollo de juegos y sistemas inteligentes
