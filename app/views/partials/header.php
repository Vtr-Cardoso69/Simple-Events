<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Eventos</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; background: #f5f5f5; }
        .container { max-width: 900px; margin: 0 auto; padding: 1.5rem; }
        header { background: #00436a; color: #fff; padding: 1rem; }
        header h1 { margin: 0; font-size: 1.4rem; }
        nav a { color: #fff; text-decoration: none; margin-right: 1rem; }
        nav a:hover { text-decoration: underline; }
        table { width: 100%; border-collapse: collapse; margin-top: 1rem; }
        th, td { padding: 0.5rem; border: 1px solid #ddd; text-align: left; }
        th { background: #f0f0f0; }
        .actions a { margin-right: 0.5rem; }
        .btn { display: inline-block; padding: 0.4rem 0.8rem; text-decoration: none; border-radius: 4px; font-size: 0.9rem; }
        .btn-primary { background: #007bff; color: #fff; }
        .btn-danger { background: #dc3545; color: #fff; }
        .btn-secondary { background: #6c757d; color: #fff; }
        .alert { padding: 1rem; background: #fff3cd; border: 1px solid #ffeeba; margin-top: 1rem; }
        form { background: #fff; padding: 1rem; border: 1px solid #ddd; margin-top: 1rem; }
        form label { display: block; margin-top: 0.75rem; font-weight: bold; }
        form input, form textarea, form select { width: 100%; padding: 0.5rem; margin-top: 0.25rem; border: 1px solid #ccc; border-radius: 4px; }
        form button { margin-top: 1rem; }
    </style>
</head>
<body>
<header>
    <div class="container">
        <h1>Sistema de Eventos</h1>
        <nav>
            <a href="index.php?controller=evento&action=index">Eventos</a>
            <a href="index.php?controller=participante&action=index">Participantes</a>
        </nav>
    </div>
</header>
<main class="container">
