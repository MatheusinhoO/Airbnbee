<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Notícias - Sócio Torcedor</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Bootstrap Icons -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
       
        <style>
            :root {
                --brazil-green: #009739;
                --brazil-yellow: #FFDF00;
                --brazil-blue: #002776;
                --brazil-white: #FFFFFF;
                --primary-color: #009739;
                --secondary-color: #FFDF00;
                --success-color: #009739;
                --warning-color: #FFDF00;
                --danger-color: #dc3545;
                --dark-bg: #002776;
                --light-bg: #f8fafc;
            }

            /* Navbar Styles */
            .custom-navbar {
                background: linear-gradient(135deg, #14532d 0%, #166534 50%, #15803d 100%);
                border-bottom: 3px solid #facc15;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            }

            .navbar-brand-custom {
                font-weight: 700;
                font-size: 1.5rem;
                background: linear-gradient(135deg, #facc15 0%, #ffffff 100%);
                -webkit-background-clip: text;
                background-clip: text;
                color: transparent;
            }

            .nav-link-custom {
                color: #f1f5f9 !important;
                font-weight: 500;
                padding: 0.5rem 1rem;
                border-radius: 0.5rem;
                transition: all 0.3s ease;
            }

            .nav-link-custom:hover,
            .nav-link-custom.active {
                background: rgba(250, 204, 21, 0.2);
                color: #ffffff !important;
            }

            .user-info {
                color: #fef9c3;
                font-weight: 600;
            }

            .logout-btn {
                background: #facc15;
                border: 1px solid #fef08a;
                color: #14532d;
                font-weight: 600;
                transition: all 0.3s ease;
            }

            .logout-btn:hover {
                background: #fde047;
                transform: translateY(-1px);
            }

            /* News Page Styles */
            .news-page {
                background: linear-gradient(135deg, #f0f9f0 0%, #e8f5e8 50%, #d4f4d4 100%);
                min-height: 100vh;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            }

            .news-header {
                background: linear-gradient(135deg, var(--brazil-white) 0%, #f8fafc 100%);
                border-bottom: 3px solid var(--brazil-yellow);
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
                padding: 2rem 0;
                margin-bottom: 2rem;
            }

            .news-container {
                background: white;
                border-radius: 1rem;
                box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
                border: 3px solid var(--brazil-green);
                overflow: hidden;
            }

            .news-card {
                border: none;
                border-radius: 1rem;
                box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
                transition: all 0.3s ease;
                height: 100%;
                overflow: hidden;
            }

            .news-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 20px 40px -10px rgba(0, 0, 0, 0.15);
            }

            .news-card.green {
                background: linear-gradient(135deg, var(--brazil-green) 0%, #007a2f 100%);
                color: white;
            }

            .news-card.yellow {
                background: linear-gradient(135deg, var(--brazil-yellow) 0%, #e6c700 100%);
                color: var(--brazil-blue);
            }

            .news-card.blue {
                background: linear-gradient(135deg, var(--brazil-blue) 0%, #001a5c 100%);
                color: white;
            }

            .news-image {
                width: 100%;
                height: 200px;
                object-fit: cover;
                border-radius: 0.5rem;
            }

            .news-title {
                font-weight: 700;
                font-size: 1.25rem;
                margin-bottom: 1rem;
            }

            .news-content {
                font-size: 0.9rem;
                opacity: 0.9;
                margin-bottom: 1.5rem;
            }

            .news-btn {
                border: none;
                border-radius: 2rem;
                padding: 0.5rem 1.5rem;
                font-weight: 600;
                transition: all 0.3s ease;
                text-decoration: none;
                display: inline-block;
            }

            .news-btn.green {
                background: var(--brazil-yellow);
                color: var(--brazil-green);
            }

            .news-btn.yellow {
                background: var(--brazil-green);
                color: white;
            }

            .news-btn.blue {
                background: var(--brazil-yellow);
                color: var(--brazil-blue);
            }

            .news-btn:hover {
                transform: translateY(-2px);
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            }

            /* ID Selection Styles */
            .id-selection {
                background: white;
                border-radius: 1rem;
                box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
                padding: 2rem;
                margin-bottom: 2rem;
            }

            .id-input-group {
                max-width: 300px;
                margin: 0 auto;
            }

            .id-input {
                border: 2px solid var(--brazil-green);
                border-radius: 0.75rem;
                padding: 0.75rem 1rem;
                font-weight: 600;
                text-align: center;
                font-size: 1.1rem;
            }

            .id-input:focus {
                border-color: var(--brazil-yellow);
                box-shadow: 0 0 0 0.2rem rgba(255, 223, 0, 0.25);
            }

            .id-btn {
                background: linear-gradient(135deg, var(--brazil-green) 0%, #007a2f 100%);
                border: none;
                border-radius: 0.75rem;
                color: white;
                font-weight: 600;
                padding: 0.75rem 1.5rem;
                transition: all 0.3s ease;
            }

            .id-btn:hover {
                background: linear-gradient(135deg, #007a2f 0%, #006627 100%);
                transform: translateY(-2px);
            }

            .crud-section {
                background: white;
                border-radius: 1rem;
                box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
                padding: 2rem;
                margin-top: 3rem;
            }

            .crud-title {
                color: var(--brazil-blue);
                font-weight: 700;
                margin-bottom: 1.5rem;
                text-align: center;
            }

            .crud-buttons {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: 1rem;
            }

            .crud-btn {
                border: none;
                border-radius: 0.75rem;
                padding: 1rem;
                font-weight: 600;
                transition: all 0.3s ease;
                text-decoration: none;
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 0.5rem;
                cursor: pointer;
            }

            .crud-btn.add {
                background: linear-gradient(135deg, var(--brazil-green) 0%, #007a2f 100%);
                color: white;
            }

            .crud-btn.view {
                background: linear-gradient(135deg, var(--brazil-blue) 0%, #001a5c 100%);
                color: white;
            }

            .crud-btn.edit {
                background: linear-gradient(135deg, var(--brazil-yellow) 0%, #e6c700 100%);
                color: var(--brazil-blue);
            }

            .crud-btn.delete {
                background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
                color: white;
            }

            .crud-btn:hover {
                transform: translateY(-3px);
                box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            }

            .crud-btn:disabled {
                opacity: 0.6;
                cursor: not-allowed;
                transform: none;
            }

            .crud-btn:disabled:hover {
                transform: none;
                box-shadow: none;
            }

            .back-btn {
                background: linear-gradient(135deg, var(--brazil-green) 0%, #007a2f 100%);
                color: white;
                border: none;
                border-radius: 2rem;
                padding: 0.75rem 2rem;
                font-weight: 600;
                transition: all 0.3s ease;
                text-decoration: none;
                display: inline-flex;
                align-items: center;
                gap: 0.5rem;
            }

            .back-btn:hover {
                background: linear-gradient(135deg, #007a2f 0%, #006627 100%);
                color: white;
                transform: translateY(-2px);
            }

            .current-id-display {
                background: linear-gradient(135deg, var(--brazil-yellow) 0%, #e6c700 100%);
                color: var(--brazil-blue);
                padding: 0.5rem 1rem;
                border-radius: 2rem;
                font-weight: 700;
                font-size: 1.1rem;
            }

            @media (max-width: 768px) {
                .crud-buttons {
                    grid-template-columns: 1fr;
                }
               
                .navbar-collapse {
                    background: linear-gradient(135deg, #14532d 0%, #0f172a 100%);
                    padding: 1rem;
                    border-radius: 0.5rem;
                    margin-top: 1rem;
                }
               
                .id-input-group {
                    max-width: 100%;
                }
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <!-- Custom Navbar -->
        <nav class="navbar navbar-expand-lg custom-navbar">
            <div class="container">
                <a class="navbar-brand navbar-brand-custom" href="#">
                    <i class="bi bi-flag-fill me-2"></i>
                    Sócio Torcedor
                </a>
               
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon">
                        <i class="bi bi-list text-white"></i>
                    </span>
                </button>
               
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link nav-link-custom" href="#">
                                <i class="bi bi-house-door me-1"></i>
                                Início
                            </a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link nav-link-custom" href="#">
                            <i class="bi bi-speedometer2 me-1"></i>
                            Dashboard
                        </a>
                    </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-custom active" href="#">
                                <i class="bi bi-newspaper me-1"></i>
                                Notícias
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-custom" href="/tabela">
                                <i class="bi bi-person me-1"></i>
                                Tabela
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-custom" href="#">
                                <i class="bi bi-person me-1"></i>
                                Perfil
                            </a>
                        </li>
                    </ul>
                   
                    <div class="d-flex align-items-center">
                        <span class="user-info me-3">
                            <i class="bi bi-person-circle me-1"></i>
                            {{ Auth::user()->name }}
                        </span>
                        <form method="POST" action="#">
                            @csrf
                            <button type="submit" class="btn logout-btn">
                                <i class="bi bi-box-arrow-right me-1"></i>
                                Sair
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>

        <!-- News Content -->
        <div class="news-page">
            <!-- Header Section -->
            <div class="news-header">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h1 class="display-5 fw-bold text-dark mb-2">
                                <i class="bi bi-newspaper me-3 text-primary"></i>
                                📰 Notícias da Seleção Brasileira
                            </h1>
                            <p class="lead text-muted mb-0">
                                Fique por dentro das novidades, convocados e bastidores da Seleção Brasileira.
                            </p>
                        </div>
                        <div class="col-md-4 text-md-end">
                            <!-- Espaço reservado para possível logo -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="container py-4">
                <div class="news-container p-4 p-md-5">
                    <!-- ID Selection Section -->
                    <div class="id-selection">
                        <div class="text-center mb-4">
                            <h4 class="fw-bold text-dark mb-3">
                                <i class="bi bi-search me-2"></i>
                                Selecione o ID da Notícia
                            </h4>
                            <p class="text-muted mb-4">
                                Digite o ID da notícia que deseja visualizar, modificar ou excluir
                            </p>
                        </div>
                       
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <div class="id-input-group">
                                    <div class="input-group mb-3">
                                        <input type="number"
                                               id="newsIdInput"
                                               class="form-control id-input"
                                               placeholder="Digite o ID"
                                               min="1"
                                               value="1">
                                        <button class="btn id-btn" type="button" onclick="updateNewsId()">
                                            <i class="bi bi-check-lg me-1"></i>
                                            Aplicar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                        <div class="text-center mt-3">
                            <span class="text-muted me-2">ID Atual:</span>
                            <span id="currentIdDisplay" class="current-id-display">1</span>
                        </div>
                    </div>

                    <!-- News Grid -->
                    <div class="row g-4">
                        <!-- Notícia 1 -->
                        <div class="col-lg-4 col-md-6">
                            <div class="news-card green p-4">
                                <h3 class="news-title">Treino da Seleção em Teresópolis</h3>
                                <p class="news-content">
                                    Jogadores se preparam para o amistoso contra a Argentina. Clima de confiança no grupo.
                                </p>
                                <a href="#" class="news-btn green" onclick="viewNews()">
                                    <i class="bi bi-eye me-1"></i>
                                    Ler mais
                                </a>
                            </div>
                        </div>

                        <!-- Notícia 2 -->
                        <div class="col-lg-4 col-md-6">
                            <div class="news-card yellow p-4">
                                <h3 class="news-title">Nova convocação é divulgada!</h3>
                                <p class="news-content">
                                    O técnico anuncia os convocados para os próximos jogos das Eliminatórias.
                                </p>
                                <a href="#" class="news-btn yellow" onclick="viewNews()">
                                    <i class="bi bi-eye me-1"></i>
                                    Ver detalhes
                                </a>
                            </div>
                        </div>

                        <!-- Notícia 3 -->
                        <div class="col-lg-4 col-md-6">
                            <div class="news-card blue p-4">
                                <h3 class="news-title">Torcida marca presença!</h3>
                                <p class="news-content">
                                    Ingressos esgotados para o próximo jogo da Seleção em casa. A energia do torcedor é o 12º jogador!
                                </p>
                                <a href="#" class="news-btn blue" onclick="viewNews()">
                                    <i class="bi bi-eye me-1"></i>
                                    Ler mais
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- CRUD Section -->
                    <div class="crud-section">
                        <h3 class="crud-title">
                            <i class="bi bi-gear-fill me-2"></i>
                            Gerenciar Notícias
                        </h3>
                        <div class="crud-buttons">
                            <a href="/formulario" class="crud-btn add">
                                <i class="bi bi-plus-circle-fill"></i>
                                Adicionar Notícia
                            </a>
                            <button class="crud-btn view" onclick="goToView()">
                                <i class="bi bi-eye-fill"></i>
                                Visualizar Notícia
                            </button>
                            <button class="crud-btn edit" onclick="goToEdit()">
                                <i class="bi bi-pencil-fill"></i>
                                Modificar Notícia
                            </button>
                            <button class="crud-btn delete" onclick="goToDelete()">
                                <i class="bi bi-trash-fill"></i>
                                Excluir Notícia
                            </button>
                        </div>
                    </div>

                    <!-- Back Button -->
                    <div class="text-center mt-5">
                        <a href="{{ route('dashboard') }}" class="back-btn">
                            <i class="bi bi-arrow-left"></i>
                            Voltar ao Painel
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

        <script>
            let currentNewsId = 1;

            function updateNewsId() {
                const input = document.getElementById('newsIdInput');
                const newId = parseInt(input.value);
               
                if (newId && newId > 0) {
                    currentNewsId = newId;
                    document.getElementById('currentIdDisplay').textContent = currentNewsId;
                   
                    // Feedback visual
                    const display = document.getElementById('currentIdDisplay');
                    display.style.transform = 'scale(1.1)';
                    setTimeout(() => {
                        display.style.transform = 'scale(1)';
                    }, 300);
                   
                    // Mostrar mensagem de sucesso
                    showNotification(`ID alterado para ${currentNewsId}`, 'success');
                } else {
                    showNotification('Por favor, digite um ID válido (número maior que 0)', 'error');
                }
            }

            function goToView() {
                window.location.href = `/formulario_visualizar/${currentNewsId}`;
            }

            function goToEdit() {
                window.location.href = `/formulario_alterar/${currentNewsId}`;
            }

            function goToDelete() {
                if (confirm(`Tem certeza que deseja excluir a notícia com ID ${currentNewsId}?`)) {
                    window.location.href = `/deleta_formulario/${currentNewsId}`;
                }
            }

            function viewNews() {
                // Para visualizar uma notícia específica dos cards
                // Você pode implementar lógica diferente aqui se necessário
                window.location.href = `/formulario_visualizar/${currentNewsId}`;
            }

            function showNotification(message, type) {
                // Criar elemento de notificação
                const notification = document.createElement('div');
                notification.className = `alert alert-${type === 'success' ? 'success' : 'danger'} alert-dismissible fade show`;
                notification.style.position = 'fixed';
                notification.style.top = '20px';
                notification.style.right = '20px';
                notification.style.zIndex = '9999';
                notification.style.minWidth = '300px';
                notification.innerHTML = `
                    ${message}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                `;
               
                document.body.appendChild(notification);
               
                // Remover automaticamente após 3 segundos
                setTimeout(() => {
                    if (notification.parentNode) {
                        notification.parentNode.removeChild(notification);
                    }
                }, 3000);
            }

            // Permitir Enter no input
            document.getElementById('newsIdInput').addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    updateNewsId();
                }
            });

            // Focar no input ao carregar a página
            document.addEventListener('DOMContentLoaded', function() {
                document.getElementById('newsIdInput').focus();
            });
        </script>
    </body>
</html>
