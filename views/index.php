<?php
require_once __DIR__ . '/../controllers/TournamentController.php';

use Controllers\TournamentController;

$tournamentController = new TournamentController();
$log = $tournamentController->startTournament();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Torneo Fist of Legends</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="tournament-container">
    <h1>Torneo - Fist of Legends</h1>
    <?php echo $log; ?>
</div>

<script src="scripts.js"></script>
</body>
</html>
