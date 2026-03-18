<?php require __DIR__ . '/../partials/header.php'; ?>

<?php
$isEdit = !empty($participante);
$formAction = $action === 'store' ? 'store' : 'update';
?>

<h2><?= $isEdit ? 'Editar participante' : 'Cadastrar participante' ?></h2>

<!-- IMPORTANTE -->
<form method="post" action="index.php?controller=participante&action=<?= $formAction ?>">
<!-- IMPORTANTE -->
 
<?php if ($isEdit): ?>
        <input type="hidden" name="id" value="<?= (int)$participante['id'] ?>">
    <?php endif; ?>

    <label for="nome">Nome</label>
    <input type="text" id="nome" name="nome" value="<?= $isEdit ? htmlspecialchars($participante['nome']) : '' ?>" required>

    <label for="email">Email</label>
    <input type="email" id="email" name="email" value="<?= $isEdit ? htmlspecialchars($participante['email']) : '' ?>" required>

    <label for="telefone">Telefone</label>
    <input type="text" id="telefone" name="telefone" value="<?= $isEdit ? htmlspecialchars($participante['telefone']) : '' ?>" required>

    <button class="btn btn-primary" type="submit"><?= $isEdit ? 'Salvar alterações' : 'Cadastrar' ?></button>
    <a class="btn btn-secondary" href="index.php?controller=participante&action=index">Voltar</a>
</form>


