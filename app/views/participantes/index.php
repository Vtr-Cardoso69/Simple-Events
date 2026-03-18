<?php require __DIR__ . '/../partials/header.php'; ?>

<h2>Participantes</h2>

<a class="btn btn-primary" href="index.php?controller=participante&action=create">Cadastrar novo participante</a>

<?php if (empty($participantes)): ?>
    <div class="alert">Nenhum participante cadastrado.</div>
<?php else: ?>
    <table>
        <thead>
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($participantes as $participante): ?>
            <tr>
                <td><?= htmlspecialchars($participante['nome']) ?></td>
                <td><?= htmlspecialchars($participante['email']) ?></td>
                <td><?= htmlspecialchars($participante['telefone']) ?></td>
                <td class="actions">
                    <a class="btn btn-secondary" href="index.php?controller=participante&action=edit&id=<?= $participante['id'] ?>">Editar</a>
                    <a class="btn btn-danger" href="index.php?controller=participante&action=delete&id=<?= $participante['id'] ?>" onclick="return confirm('Deseja excluir este participante?');">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

<?php require __DIR__ . '/../partials/footer.php'; ?>
