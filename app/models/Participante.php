<?php

require_once __DIR__ . '/../Database.php';

class Participante
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::conectar();
    }

    public function getAll(): array
    {
        $stmt = $this->db->query('SELECT * FROM participantes ORDER BY nome');
        return $stmt->fetchAll();
    }

    public function findById(int $id): ?array
    {
        $stmt = $this->db->prepare('SELECT * FROM participantes WHERE id = :id');
        $stmt->execute(['id' => $id]);
        $participant = $stmt->fetch();
        return $participant ?: null;
    }

    public function create(array $data): bool
    {
        $stmt = $this->db->prepare(
            'INSERT INTO participantes (nome, email, telefone) VALUES (:nome, :email, :telefone)'
        );

        return $stmt->execute([
            'nome' => $data['nome'],
            'email' => $data['email'],
            'telefone' => $data['telefone'],
        ]);
    }

    public function update(int $id, array $data): bool
    {
        $stmt = $this->db->prepare(
            'UPDATE participantes SET nome = :nome, email = :email, telefone = :telefone WHERE id = :id'
        );

        return $stmt->execute([
            'id' => $id,
            'nome' => $data['nome'],
            'email' => $data['email'],
            'telefone' => $data['telefone'],
        ]);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare('DELETE FROM participantes WHERE id = :id');
        return $stmt->execute(['id' => $id]);
    }
}
