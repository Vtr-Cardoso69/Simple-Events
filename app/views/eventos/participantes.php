<?php require __DIR__ . '/../partials/header.php'; ?>

<h2>Participantes do evento: <?= htmlspecialchars($evento['nome']) ?></h2>

<div style="margin-bottom: 1rem;">
    <a class="btn btn-primary" href="index.php?controller=inscricao&action=create&evento_id=<?= $evento['id'] ?>">Inscrever participante</a>
    <a class="btn btn-secondary" href="index.php?controller=evento&action=index">Voltar para eventos</a>
</div>

<?php if (empty($participantes)): ?>
    <div class="alert">Nenhum participante inscrito neste evento.</div>
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
        <?php foreach ($participantes as $p): ?>
            <tr>
                <td><?= htmlspecialchars($p['nome']) ?></td>
                <td><?= htmlspecialchars($p['email']) ?></td>
                <td><?= htmlspecialchars($p['telefone']) ?></td>
                <td class="actions">
                    <a class="btn btn-danger" href="index.php?controller=inscricao&action=delete&evento_id=<?= $evento['id'] ?>&participante_id=<?= $p['id'] ?>" onclick="return confirm('Remover inscrição?');">Remover</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

<?php require __DIR__ . '/../partials/footer.php'; ?>
