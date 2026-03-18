<?php

require_once __DIR__ . '/../Database.php';

class Evento
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::conectar();
    }

    public function getAll(): array
    {
        $stmt = $this->db->query('SELECT * FROM eventos ORDER BY data_evento, horario');
        return $stmt->fetchAll();
    }

    public function findById(int $id): ?array
    {
        $stmt = $this->db->prepare('SELECT * FROM eventos WHERE id = :id');
        $stmt->execute(['id' => $id]);
        $event = $stmt->fetch();
        return $event ?: null;
    }

    public function create(array $data): bool
    {
        $stmt = $this->db->prepare(
            'INSERT INTO eventos (nome, descricao, data_evento, horario, local, capacidade) VALUES (:nome, :descricao, :data_evento, :horario, :local, :capacidade)'
        );

        return $stmt->execute([
            'nome' => $data['nome'],
            'descricao' => $data['descricao'],
            'data_evento' => $data['data_evento'],
            'horario' => $data['horario'],
            'local' => $data['local'],
            'capacidade' => $data['capacidade'],
        ]);
    }

    public function update(int $id, array $data): bool
    {
        $stmt = $this->db->prepare(
            'UPDATE eventos SET nome = :nome, descricao = :descricao, data_evento = :data_evento, horario = :horario, local = :local, capacidade = :capacidade WHERE id = :id'
        );

        return $stmt->execute([
            'id' => $id,
            'nome' => $data['nome'],
            'descricao' => $data['descricao'],
            'data_evento' => $data['data_evento'],
            'horario' => $data['horario'],
            'local' => $data['local'],
            'capacidade' => $data['capacidade'],
        ]);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare('DELETE FROM eventos WHERE id = :id');
        return $stmt->execute(['id' => $id]);
    }

}