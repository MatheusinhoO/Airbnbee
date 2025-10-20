<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Airbee Tatuí - Cadastro de Locações</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <style>
                    * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
       
        :root {
            --amarelo: #FFD700;
            --amarelo-escuro: #FFC400;
            --branco: #FFFFFF;
            --preto: #333333;
            --cinza-claro: #f5f5f5;
            --cinza: #e0e0e0;
            --verde: #2e7d32;
            --laranja: #ef6c00;
            --vermelho: #f44336;
        }
       
        body {
            background-color: var(--cinza-claro);
            padding: 20px;
            color: var(--preto);
        }
       
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
       
        .header {
            background: linear-gradient(135deg, var(--amarelo), var(--amarelo-escuro));
            color: var(--preto);
            padding: 25px;
            border-radius: 15px 15px 0 0;
            margin-bottom: 25px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
        }
       
        .header::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, var(--amarelo), var(--branco), var(--preto), var(--amarelo));
        }
       
        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }
       
        .logo {
            display: flex;
            align-items: center;
            gap: 15px;
        }
       
        .logo i {
            font-size: 2.5rem;
        }
       
        .logo-text h1 {
            font-size: 2.2rem;
            margin-bottom: 5px;
        }
       
        .logo-text p {
            font-size: 1.1rem;
            opacity: 0.9;
        }
       
        .tatuí-badge {
            background-color: var(--preto);
            color: var(--branco);
            padding: 8px 15px;
            border-radius: 20px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
        }
       
        .card {
            background-color: var(--branco);
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 25px;
            margin-bottom: 25px;
        }
       
        .card-title {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
            color: var(--preto);
            border-bottom: 2px solid var(--amarelo);
            padding-bottom: 10px;
        }
       
        .card-title i {
            color: var(--amarelo);
        }
       
        .form-row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 20px;
        }
       
        .form-group {
            flex: 1 1 300px;
            margin-bottom: 20px;
        }
       
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--preto);
        }
       
        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid var(--cinza);
            border-radius: 6px;
            font-size: 1rem;
            transition: all 0.3s;
        }
       
        .form-control:focus {
            border-color: var(--amarelo);
            outline: none;
            box-shadow: 0 0 0 3px rgba(255, 215, 0, 0.2);
        }
       
        .btn {
            padding: 12px 25px;
            border: none;
            border-radius: 6px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
       
        .btn-primary {
            background-color: var(--amarelo);
            color: var(--preto);
        }
       
        .btn-primary:hover {
            background-color: var(--amarelo-escuro);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
       
        .btn-secondary {
            background-color: var(--preto);
            color: var(--branco);
        }
       
        .btn-secondary:hover {
            background-color: #555;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
       
        .table-container {
            overflow-x: auto;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }
       
        table {
            width: 100%;
            border-collapse: collapse;
        }
       
        th {
            background-color: var(--amarelo);
            color: var(--preto);
            padding: 15px;
            text-align: left;
            font-weight: 600;
        }
       
        td {
            padding: 15px;
            border-bottom: 1px solid var(--cinza);
        }
       
        tr:nth-child(even) {
            background-color: var(--cinza-claro);
        }
       
        tr:hover {
            background-color: #fff9e6;
        }
       
        .status {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            display: inline-block;
        }
       
        .status-active {
            background-color: #e8f5e9;
            color: var(--verde);
        }
       
        .status-pending {
            background-color: #fff3e0;
            color: var(--laranja);
        }
       
        .status-completed {
            background-color: #f5f5f5;
            color: #616161;
        }
       
        .actions {
            display: flex;
            gap: 10px;
        }
       
        .actions button {
            background: none;
            border: none;
            cursor: pointer;
            font-size: 1.1rem;
            padding: 5px;
            border-radius: 4px;
            transition: all 0.2s;
        }
       
        .edit-btn {
            color: var(--amarelo);
        }
       
        .edit-btn:hover {
            background-color: rgba(255, 215, 0, 0.1);
        }
       
        .delete-btn {
            color: var(--vermelho);
        }
       
        .delete-btn:hover {
            background-color: rgba(244, 67, 54, 0.1);
        }
       
        .footer {
            text-align: center;
            margin-top: 30px;
            color: #666;
            font-size: 0.9rem;
            padding: 20px;
            border-top: 2px solid var(--amarelo);
        }
       
        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }
       
        .footer-logo {
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 600;
        }
       
        .location {
            display: flex;
            align-items: center;
            gap: 8px;
        }
       
        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
           
            .logo-text h1 {
                font-size: 1.8rem;
            }
           
            .btn {
                width: 100%;
                justify-content: center;
                margin-bottom: 10px;
            }
           
            .footer-content {
                flex-direction: column;
                text-align: center;
            }
        }
       
        .bairro-tatuí {
            background-color: rgba(255, 215, 0, 0.1);
            border-left: 4px solid var(--amarelo);
            padding: 10px 15px;
            margin: 15px 0;
            border-radius: 0 8px 8px 0;
        }
        </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="header-content">
                <div class="logo">
                    <i class="fas fa-home"></i>
                    <div class="logo-text">
                        <h1>Airbee Tatuí</h1>
                        <p>Sistema de Cadastro de Locações</p>
                    </div>
                </div>
                <div class="tatuí-badge">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>Tatuí - Capital da Música</span>
                </div>
            </div>
        </div>
       
        <div class="card">
            <h2 class="card-title">
                <i class="fas fa-plus-circle"></i>
                Nova Locação em Tatuí
            </h2>
            <form id="rentalForm">
                <div class="form-row">
                    <div class="form-group">
                        <label for="clientName"><i class="fas fa-user"></i> Nome do Cliente</label>
                        <input type="text" id="clientName" class="form-control" placeholder="Digite o nome do cliente">
                    </div>
                   
                    <div class="form-group">
                        <label for="property"> Propriedade</label>
                        <input type="text" id="property" class="form-control" placeholder="Digite o nome da propriedade">
                    </div>
                    
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="clientName"><i class="fas fa-user"></i> Nome do Cliente</label>
                        <input type="text" id="clientName" class="form-control" placeholder="Digite o nome do cliente">
                    </div>
                   
                    <div class="form-group">
                        <label for="property"> Propriedade</label>
                        <input type="text" id="property" class="form-control" placeholder="Digite o nome da propriedade">
                    </div>
                    
                </div>

               <i class="fas fa-building"></i>
                <div class="form-row">
                    <div class="form-group">
                        <label for="bairro"><i class="fas fa-map-pin"></i> Bairro de Tatuí</label>
                        <select id="bairro" class="form-control">
                            <option value="">Selecione o bairro</option>
                            <option value="centro">Centro</option>
                            <option value="jd_santa_rita">Jardim Santa Rita</option>
                            <option value="jd_planalto">Jardim Planalto</option>
                            <option value="jd_brasil">Jardim Brasil</option>
                            <option value="jd_europa">Jardim Europa</option>
                            <option value="jd_maria_iza">Jardim Maria Iza</option>
                            <option value="jd_sao_marcos">Jardim São Marcos</option>
                            <option value="jd_maria_luiza">Jardim Maria Luiza</option>
                            <option value="jd_gramado">Jardim Gramado</option>
                            <option value="jd_união">Jardim União</option>
                            <option value="jd_bandeirantes">Jardim Bandeirantes</option>
                            <option value="jd_maristela">Jardim Maristela</option>
                            <option value="jd_rodrigues">Jardim Rodrigues</option>
                            <option value="jd_altos_da_boa_vista">Altos da Boa Vista</option>
                            <option value="jd_novo_horizonte">Jardim Novo Horizonte</option>
                            <option value="jd_terra_branca">Jardim Terra Branca</option>
                            <option value="jd_residencial_maria_iza">Residencial Maria Iza</option>
                            <option value="jd_residencial_maria_izabel">Residencial Maria Izabel</option>
                            <option value="jd_vila_angélica">Vila Angélica</option>
                            <option value="jd_vila_são_cristovão">Vila São Cristóvão</option>
                            <option value="jd_vila_são_lázaro">Vila São Lázaro</option>
                            <option value="jd_vila_são_paulo">Vila São Paulo</option>
                        </select>
                    </div>
                   
                    <div class="form-group">
                        <label for="propertyType"><i class="fas fa-home"></i> Tipo de Imóvel</label>
                        <select id="propertyType" class="form-control">
                            <option value="">Selecione o tipo</option>
                            <option value="casa">Casa</option>
                            <option value="apartamento">Apartamento</option>
                            <option value="studio">Studio</option>
                            <option value="kitnet">Kitnet</option>
                            <option value="sobrado">Sobrado</option>
                            <option value="chacara">Chácara</option>
                        </select>
                    </div>
                </div>
               
                <div class="form-row">
                    <div class="form-group">
                        <label for="checkIn"><i class="fas fa-calendar-alt"></i> Check-in</label>
                        <input type="date" id="checkIn" class="form-control">
                    </div>
                   
                    <div class="form-group">
                        <label for="checkOut"><i class="fas fa-calendar-alt"></i> Check-out</label>
                        <input type="date" id="checkOut" class="form-control">
                    </div>
                   
                    <div class="form-group">
                        <label for="value"><i class="fas fa-dollar-sign"></i> Valor (R$)</label>
                        <input type="number" id="value" class="form-control" placeholder="0,00" step="0.01">
                    </div>
                </div>
               
                <div class="form-group">
                    <label for="status"><i class="fas fa-info-circle"></i> Status</label>
                    <select id="status" class="form-control">
                        <option value="active">Ativa</option>
                        <option value="pending">Pendente</option>
                        <option value="completed">Concluída</option>
                    </select>
                </div>
               
                <div class="bairro-tatuí">
                    <i class="fas fa-info-circle"></i> <strong>Tatuí - SP</strong>: Conhecida como "Capital da Música", a cidade possui diversos pontos turísticos como o Conservatório Dramático e Musical "Dr. Carlos de Campos" e a Igreja Matriz.
                </div>
               
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Cadastrar Locação
                </button>
                <button type="reset" class="btn btn-secondary">
                    <i class="fas fa-broom"></i> Limpar Campos
                </button>
            </form>
        </div>
       
        <div class="card">
            <h2 class="card-title">
                <i class="fas fa-list"></i>
                Locações Cadastradas em Tatuí
            </h2>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Cliente</th>
                            <th>Propriedade</th>
                            <th>Bairro</th>
                            <th>Check-in</th>
                            <th>Check-out</th>
                            <th>Valor</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>João Silva</td>
                            <td>Casa com Piscina</td>
                            <td>Centro</td>
                            <td>15/10/2023</td>
                            <td>20/10/2023</td>
                            <td>R$ 1.200,00</td>
                            <td><span class="status status-active">Ativa</span></td>
                            <td class="actions">
                                <button class="edit-btn" title="Editar"><i class="fas fa-edit"></i></button>
                                <button class="delete-btn" title="Excluir"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>Maria Santos</td>
                            <td>Apartamento Mobiliado</td>
                            <td>Jardim Santa Rita</td>
                            <td>05/11/2023</td>
                            <td>12/11/2023</td>
                            <td>R$ 1.800,00</td>
                            <td><span class="status status-pending">Pendente</span></td>
                            <td class="actions">
                                <button class="edit-btn" title="Editar"><i class="fas fa-edit"></i></button>
                                <button class="delete-btn" title="Excluir"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>Carlos Oliveira</td>
                            <td>Studio Compacto</td>
                            <td>Jardim Planalto</td>
                            <td>01/10/2023</td>
                            <td>05/10/2023</td>
                            <td>R$ 650,00</td>
                            <td><span class="status status-completed">Concluída</span></td>
                            <td class="actions">
                                <button class="edit-btn" title="Editar"><i class="fas fa-edit"></i></button>
                                <button class="delete-btn" title="Excluir"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>Ana Costa</td>
                            <td>Sobrado Familiar</td>
                            <td>Jardim Europa</td>
                            <td>20/11/2023</td>
                            <td>25/11/2023</td>
                            <td>R$ 2.100,00</td>
                            <td><span class="status status-active">Ativa</span></td>
                            <td class="actions">
                                <button class="edit-btn" title="Editar"><i class="fas fa-edit"></i></button>
                                <button class="delete-btn" title="Excluir"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
       
        <div class="footer">
            <div class="footer-content">
                <div class="footer-logo">
                    <i class="fas fa-home"></i>
                    <span>Airbee Tatuí</span>
                </div>
                <div class="location">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>Tatuí - São Paulo, Brasil</span>
                </div>
                <div>
                    <p>&copy; 2023 - Todos os direitos reservados</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('rentalForm').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Locação em Tatuí cadastrada com sucesso!');
            this.reset();
        });
       
       
        document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', function() {
                alert('Editar locação - Funcionalidade em desenvolvimento');
            });
        });
       
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function() {
                if(confirm('Tem certeza que deseja excluir esta locação?')) {
                    alert('Locação excluída com sucesso!');
                }
            });
        });
    </script>
</body>
</html>