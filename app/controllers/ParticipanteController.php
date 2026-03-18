<?php

require_once __DIR__ . '/../Controller.php';
require_once __DIR__ . '/../models/Participante.php';

class ParticipanteController extends Controller
{
    public function index(): void
    {
        $model = new Participante();
        $participantes = $model->getAll();

        $this->view('participantes/index', ['participantes' => $participantes]);
    }

    public function create(): void
    {
        $this->view('participantes/form', ['participante' => null, 'action' => 'store']);
    }

    public function store(): void
    {
        $data = [
            'nome' => $_POST['nome'] ?? '',
            'email' => $_POST['email'] ?? '',
            'telefone' => $_POST['telefone'] ?? '',
        ];

        $model = new Participante();
        $model->create($data);

        $this->redirect('index.php?controller=participante&action=index');
    }

    public function edit(): void
    {
        $id = (int)($_GET['id'] ?? 0);
        $model = new Participante();
        $participante = $model->findById($id);

        if (!$participante) {
            http_response_code(404);
            echo 'Participante não encontrado';
            return;
        }

        $this->view('participantes/form', ['participante' => $participante, 'action' => 'update']);
    }

    public function update(): void
    {
        $id = (int)($_POST['id'] ?? 0);
        $data = [
            'nome' => $_POST['nome'] ?? '',
            'email' => $_POST['email'] ?? '',
            'telefone' => $_POST['telefone'] ?? '',
        ];

        $model = new Participante();
        $model->update($id, $data);

        $this->redirect('index.php?controller=participante&action=index');
    }

    public function delete(): void
    {
        $id = (int)($_GET['id'] ?? 0);
        $model = new Participante();
        $model->delete($id);

        $this->redirect('index.php?controller=participante&action=index');
    }
}
