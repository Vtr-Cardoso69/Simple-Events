<?php require __DIR__ . '/../partials/header.php'; ?>

<h2>Inscrição bloqueada</h2>

<div class="alert">
    O evento "<?= htmlspecialchars($evento['nome']) ?>" atingiu a capacidade máxima (<?= (int)$evento['capacidade'] ?> participantes).
</div>

<a class="btn btn-secondary" href="index.php?controller=evento&action=participantes&id=<?= $evento['id'] ?>">Voltar</a>


