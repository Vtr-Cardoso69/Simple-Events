<?php require __DIR__ . '/../partials/header.php'; ?>

<h2>Inscrição não realizada</h2>

<div class="alert">
    O participante já está inscrito neste evento.
</div>

<a class="btn btn-secondary" href="index.php?controller=evento&action=participantes&id=<?= $evento['id'] ?>">Voltar</a>


