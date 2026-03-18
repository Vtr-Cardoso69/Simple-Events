<?php require __DIR__ . '/../partials/header.php'; ?>

<h2>Eventos</h2>

<a class="btn btn-primary" href="index.php?controller=evento&action=create">Cadastrar novo evento</a>

<?php if (empty($eventos)): ?>
    <div class="alert">Nenhum evento cadastrado.</div>
<?php else: ?>
    <table>
        <thead>
        <tr>
            <th>Nome</th>
            <th>Data</th>
            <th>Horário</th>
            <th>Local</th>
            <th>Capacidade</th>
            <th>Inscritos</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($eventos as $evento): ?>
            <tr>
                <td><?= htmlspecialchars($evento['nome']) ?></td>
                <td><?= htmlspecialchars($evento['data_evento']) ?></td>
                <td><?= htmlspecialchars($evento['horario']) ?></td>
                <td><?= htmlspecialchars($evento['local']) ?></td>
                <td><?= (int)$evento['capacidade'] ?></td>
                <td><?= (int)$evento['inscritos'] ?></td>
                <td class="actions">
                    <a class="btn btn-secondary" href="index.php?controller=evento&action=edit&id=<?= $evento['id'] ?>">Editar</a>
                    <a class="btn btn-secondary" href="index.php?controller=evento&action=participantes&id=<?= $evento['id'] ?>">Participantes</a>
                    <a class="btn btn-danger" href="index.php?controller=evento&action=delete&id=<?= $evento['id'] ?>" onclick="return confirm('Deseja excluir este evento?');">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

<?php require __DIR__ . '/../partials/footer.php'; ?>
