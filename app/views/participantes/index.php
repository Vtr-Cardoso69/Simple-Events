<?php require __DIR__ . '/../partials/header.php'; ?>

<h2>Participantes</h2>

<a class="btn btn-primary" href="index.php?controller=participante&action=create">Cadastrar Participante</a>

<?php $totalParticipantes = count($participantes); ?>

<div class="alert">
    <?= $totalParticipantes ?> participante<?= $totalParticipantes != 1 ? 's' : '' ?>
</div>

<?php if ($totalParticipantes > 0): ?>

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
                    
                    <!-- LEVA ATÉ O CONTROLLER PARTICIPANTE, DEPOIS EM EDIT(UPDATE), DIZENDO AO FORM QUE É UMA EDIÇÃO -->
                    <a class="btn btn-secondary" href="index.php?controller=participante&action=edit&id=<?= $participante['id'] ?>">Editar</a>
                    <!-- LEVA ATÉ O CONTROLLER PARTICIPANTE, DEPOIS EM EDIT(UPDATE), DIZENDO AO FORM QUE É UMA EDIÇÃO -->
                     
                    <a class="btn btn-danger" href="index.php?controller=participante&action=delete&id=<?= $participante['id'] ?>" onclick="return confirm('Deseja excluir este participante?');">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

<?php else: ?>
    <p>Nenhum participante cadastrado.</p>
<?php endif; ?>


