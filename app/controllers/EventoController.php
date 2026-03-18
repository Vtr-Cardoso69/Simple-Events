<?php

require_once __DIR__ . '/../Controller.php';
require_once __DIR__ . '/../models/Evento.php';
require_once __DIR__ . '/../models/Inscricao.php';
require_once __DIR__ . '/../models/Evento.php';

class EventoController extends Controller
{
    public function index(): void
    {
        $eventoModel = new Evento();
        $inscricaoModel = new Inscricao();
        $eventos = $eventoModel->getAll();

        foreach ($eventos as &$evento) {
            $evento['inscritos'] = $inscricaoModel->countByEvento((int)$evento['id']);
        }

        $this->view('eventos/index', ['eventos' => $eventos]);
    }

    public function create(): void
    {
        $this->view('eventos/form', ['evento' => null, 'action' => 'store']);
    }

    public function store(): void
    {
        $data = [
            'nome' => $_POST['nome'] ?? '',
            'descricao' => $_POST['descricao'] ?? '',
            'data_evento' => $_POST['data_evento'] ?? '',
            'horario' => $_POST['horario'] ?? '',
            'local' => $_POST['local'] ?? '',
            'capacidade' => (int)($_POST['capacidade'] ?? 0),
        ];

        $eventoModel = new Evento();
        $eventoModel->create($data);

        $this->redirect('index.php?controller=evento&action=index');
    }

    public function edit(): void
    {
        $id = (int)($_GET['id'] ?? 0);
        $eventoModel = new Evento();
        $evento = $eventoModel->findById($id);

        if (!$evento) {
            http_response_code(404);
            echo 'Evento não encontrado';
            return;
        }

        $this->view('eventos/form', ['evento' => $evento, 'action' => 'update']);
    }

    public function update(): void
    {
        $id = (int)($_POST['id'] ?? 0);
        $data = [
            'nome' => $_POST['nome'] ?? '',
            'descricao' => $_POST['descricao'] ?? '',
            'data_evento' => $_POST['data_evento'] ?? '',
            'horario' => $_POST['horario'] ?? '',
            'local' => $_POST['local'] ?? '',
            'capacidade' => (int)($_POST['capacidade'] ?? 0),
        ];

        $eventoModel = new Evento();
        $eventoModel->update($id, $data);

        $this->redirect('index.php?controller=evento&action=index');
    }

    public function delete(): void
    {
        $id = (int)($_GET['id'] ?? 0);
        $eventoModel = new Evento();
        $eventoModel->delete($id);

        $this->redirect('index.php?controller=evento&action=index');
    }

    public function participantes(): void
    {
        $id = (int)($_GET['id'] ?? 0);
        $eventoModel = new Evento();
        $evento = $eventoModel->findById($id);

        if (!$evento) {
            http_response_code(404);
            echo 'Evento não encontrado';
            return;
        }

        $inscricaoModel = new Inscricao();
        $participantes = $inscricaoModel->getByEvento($id);

        $this->view('eventos/participantes', [
            'evento' => $evento,
            'participantes' => $participantes,
        ]);
    }

}
