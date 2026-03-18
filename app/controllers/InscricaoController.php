<?php

require_once __DIR__ . '/../Controller.php';
require_once __DIR__ . '/../models/Evento.php';
require_once __DIR__ . '/../models/Inscricao.php';
require_once __DIR__ . '/../models/Participante.php';

class InscricaoController extends Controller
{
    public function create(): void
    {
        $eventoId = (int)($_GET['evento_id'] ?? 0);

        $eventoModel = new Evento();
        $evento = $eventoModel->findById($eventoId);

        if (!$evento) {
            http_response_code(404);
            echo 'Evento não encontrado';
            return;
        }

        $participanteModel = new Participante();
        $participantes = $participanteModel->getAll();

        $inscricaoModel = new Inscricao();
        $inscritos = $inscricaoModel->countByEvento($eventoId);

        $this->view('inscricoes/form', [
            'evento' => $evento,
            'participantes' => $participantes,
            'inscritos' => $inscritos,
        ]);
    }

    public function store(): void
    {
        $eventoId = (int)($_POST['evento_id'] ?? 0);
        $participanteId = (int)($_POST['participante_id'] ?? 0);

        $eventoModel = new Evento();
        $evento = $eventoModel->findById($eventoId);

        if (!$evento) {
            http_response_code(404);
            echo 'Evento não encontrado';
            return;
        }

        $inscricaoModel = new Inscricao();

        // Verifica se já atingiu a capacidade
        $totalInscritos = $inscricaoModel->countByEvento($eventoId);
        if ($totalInscritos >= (int)$evento['capacidade']) {
            $this->view('inscricoes/capacidade', ['evento' => $evento]);
            return;
        }

        // Tenta criar inscrição
        $success = $inscricaoModel->create($eventoId, $participanteId);

        if (!$success) {
            $this->view('inscricoes/duplicado', ['evento' => $evento]);
            return;
        }

        $this->redirect('index.php?controller=evento&action=participantes&id=' . $eventoId);
    }

    public function delete(): void
    {
        $eventoId = (int)($_GET['evento_id'] ?? 0);
        $participanteId = (int)($_GET['participante_id'] ?? 0);

        $inscricaoModel = new Inscricao();
        $inscricaoModel->delete($eventoId, $participanteId);

        $this->redirect('index.php?controller=evento&action=participantes&id=' . $eventoId);
    }
}
