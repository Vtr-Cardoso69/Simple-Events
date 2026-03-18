<?php require __DIR__ . '/../partials/header.php'; ?>

<h2>Inscrição no evento: <?= htmlspecialchars($evento['nome']) ?></h2>

<div style="margin-bottom: 1rem;">
    <a class="btn btn-secondary" href="index.php?controller=evento&action=participantes&id=<?= $evento['id'] ?>">Voltar</a>
</div>

<?php if ($inscritos >= (int)$evento['capacidade']): ?>
    <div class="alert">Este evento já atingiu a capacidade máxima de <?= (int)$evento['capacidade'] ?> participantes.</div>
<?php endif; ?>

<form method="post" action="index.php?controller=inscricao&action=store">
    <input type="hidden" name="evento_id" value="<?= $evento['id'] ?>">

    <label for="participante_id">Participante</label>
    <select id="participante_id" name="participante_id" required>
        <option value="">-- selecione --</option>
        <?php foreach ($participantes as $p): ?>
            <option value="<?= $p['id'] ?>"><?= htmlspecialchars($p['nome']) ?> (<?= htmlspecialchars($p['email']) ?>)</option>
        <?php endforeach; ?>
    </select>

    <button class="btn btn-primary" type="submit" <?= $inscritos >= (int)$evento['capacidade'] ? 'disabled' : '' ?>>Inscrever</button>
</form>

<?php require __DIR__ . '/../partials/footer.php'; ?>
