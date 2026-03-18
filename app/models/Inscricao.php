<?php

require_once __DIR__ . '/../Database.php';

class Inscricao
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::conectar();
    }

    public function create(int $eventoId, int $participanteId): bool
    {
        // Verifica se já existe inscrição
        if ($this->exists($eventoId, $participanteId)) {
            return false;
        }

        $stmt = $this->db->prepare('INSERT INTO inscricoes (evento_id, participante_id) VALUES (:evento_id, :participante_id)');
        return $stmt->execute([
            'evento_id' => $eventoId,
            'participante_id' => $participanteId,
        ]);
    }

    public function exists(int $eventoId, int $participanteId): bool
    {
        $stmt = $this->db->prepare('SELECT 1 FROM inscricoes WHERE evento_id = :evento_id AND participante_id = :participante_id');
        $stmt->execute([
            'evento_id' => $eventoId,
            'participante_id' => $participanteId,
        ]);
        return (bool)$stmt->fetchColumn();
    }

    public function getByEvento(int $eventoId): array
    {
        $stmt = $this->db->prepare(
            'SELECT p.*
             FROM participantes p
             JOIN inscricoes i ON p.id = i.participante_id
             WHERE i.evento_id = :evento_id
             ORDER BY p.nome'
        );
        $stmt->execute(['evento_id' => $eventoId]);
        return $stmt->fetchAll();
    }

    public function delete(int $eventoId, int $participanteId): bool
    {
        $stmt = $this->db->prepare(
            'DELETE FROM inscricoes WHERE evento_id = :evento_id AND participante_id = :participante_id'
        );
        return $stmt->execute([
            'evento_id' => $eventoId,
            'participante_id' => $participanteId,
        ]);
    }

    public function countByEvento(int $eventoId): int
    {
        $stmt = $this->db->prepare('SELECT COUNT(*) FROM inscricoes WHERE evento_id = :evento_id');
        $stmt->execute(['evento_id' => $eventoId]);
        return (int)$stmt->fetchColumn();
    }
}
