<?php require __DIR__ . '/../partials/header.php'; ?>

<?php
$isEdit = !empty($evento);
$formAction = $action === 'store' ? 'store' : 'update';
?>

<h2><?= $isEdit ? 'Editar evento' : 'Cadastrar evento' ?></h2>

<form method="post" action="index.php?controller=evento&action=<?= $formAction ?>">
    <?php if ($isEdit): ?>
        <input type="hidden" name="id" value="<?= (int)$evento['id'] ?>">
    <?php endif; ?>

    <label for="nome">Nome</label>
    <input type="text" id="nome" name="nome" value="<?= $isEdit ? htmlspecialchars($evento['nome']) : '' ?>" required>

    <label for="descricao">Descrição</label>
    <textarea id="descricao" name="descricao" rows="4"><?= $isEdit ? htmlspecialchars($evento['descricao']) : '' ?></textarea>

    <label for="data_evento">Data</label>
    <input type="date" id="data_evento" name="data_evento" value="<?= $isEdit ? htmlspecialchars($evento['data_evento']) : '' ?>" required>

    <label for="horario">Horário</label>
    <input type="time" id="horario" name="horario" value="<?= $isEdit ? htmlspecialchars($evento['horario']) : '' ?>" required>

    <label for="local">Local</label>
    <input type="text" id="local" name="local" value="<?= $isEdit ? htmlspecialchars($evento['local']) : '' ?>" required>

    <label for="capacidade">Capacidade Máxima</label>
    <input type="number" id="capacidade" name="capacidade" min="1" value="<?= $isEdit ? (int)$evento['capacidade'] : '1' ?>" required>

    <button class="btn btn-primary" type="submit"><?= $isEdit ? 'Salvar alterações' : 'Cadastrar' ?></button>
    <a class="btn btn-secondary" href="index.php?controller=evento&action=index">Voltar</a>
</form>

<?php require __DIR__ . '/../partials/footer.php'; ?>
