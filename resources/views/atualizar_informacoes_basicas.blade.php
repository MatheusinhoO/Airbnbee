<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Locações</title>
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
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            max-width: 600px;
            width: 100%;
            padding: 40px;
            animation: slideIn 0.5s ease-out;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h1 {
            color: #333;
            margin-bottom: 10px;
            font-size: 28px;
            text-align: center;
        }

        .subtitle {
            color: #666;
            text-align: center;
            margin-bottom: 30px;
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: 600;
            font-size: 14px;
        }

        input[type="text"],
        input[type="date"],
        input[type="number"],
        select {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 15px;
            transition: all 0.3s ease;
            background: white;
        }

        input[type="text"]:focus
        input[type="date"]:focus
        input[type="number"]:focus,
        select:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        input[type="text"]:hover
        input[type="date"]:hover
        input[type="number"]:hover,
        select:hover {
            border-color: #b0b0b0;
        }

        .row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .btn-submit {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
        }

        .btn-submit:active {
            transform: translateY(0);
        }

        .success-message {
            display: none;
            background: #4caf50;
            color: white;
            padding: 15px;
            border-radius: 10px;
            margin-top: 20px;
            text-align: center;
            animation: fadeIn 0.5s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .required {
            color: #e74c3c;
        }

        @media (max-width: 600px) {
            .container {
                padding: 25px;
            }

            .row {
                grid-template-columns: 1fr;
            }

            h1 {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🏠 Atualização das Informações Basicas</h1>
        <p class="subtitle">Preencha os novos dados da sua propriedade</p>
        
        <form action="{{route('alterar_informacao')}}" method="POST">
        @csrf


        <input type="text" class="d-none" name="id_informacao" id="id_informacao" value={{ $informacao->id }}>
            <div class="form-group">
                <label for="propriedade_tipo">Tipo de Propriedade <span class="required">*</span></label>
                <select id="propriedade_tipo" name="propriedade_tipo" required>
                    <option value="">{{ $informacao->propriedade_tipo }}</option>
                    <option value="casa">Casa</option>
                    <option value="apartamento">Apartamento</option>
                    <option value="condominio">Condomínio</option>
                    <option value="celeiro">Celeiro</option>
                    <option value="chale">Chalé</option>
                    <option value="sitio">Sítio</option>
                    <option value="fazenda">Fazenda</option>
                    <option value="pousada">Pousada</option>
                    <option value="microcasa">Microcasa</option>
                </select>
            </div>

            <div class="form-group">
                <label for="acomodacoes_tipo">Tipo de Acomodações <span class="required">*</span></label>
                <select id="acomodacoes_tipo" name="acomodacoes_tipo" required>
                    <option value="">{{ $informacao->acomodacoes_tipo }}</option>
                    <option value="propriedade_inteira">Propriedade Inteira</option>
                    <option value="quarto_privado">Quarto Privado</option>
                    <option value="quarto_compartilhado">Quarto Compartilhado</option>
                </select>
            </div>

            <div class="form-group">
                <label for="capacidade_hospedes">Capacidade de Hóspedes <span class="required">*</span></label>
                <input type="number" id="capacidade_hospedes" name="capacidade_hospedes" min="1" max="50" value={{ $informacao->capacidade_hospedes }}>
            </div>

            <div class="row">
                <div class="form-group">
                    <label for="quartos_quantidade">Quartos <span class="required">*</span></label>
                    <input type="number" id="quartos_quantidade" name="quartos_quantidade" min="0" max="20" value={{ $informacao->quartos_quantidade }}>
                </div>

                <div class="form-group">
                    <label for="camas_quantidade">Camas <span class="required">*</span></label>
                    <input type="number" id="camas_quantidade" name="camas_quantidade" min="1" max="50" value={{ $informacao->camas_quantidade }}>
                </div>
            </div>

            <div class="form-group">
                <label for="banheiros_quantidade">Banheiros <span class="required">*</span></label>
                <input type="number" id="banheiros_quantidade" name="banheiros_quantidade" min="1" max="20" step="1" value={{ $informacao->banheiros_quantidade }}>
            </div>

            <div class="form-group">
                <label for="preco_noite">Preço por Noite (R$) <span class="required">*</span></label>
                <input type="number" id="preco_noite" name="preco_noite" min="0" step="50" value={{ $informacao->preco_noite }}>
            </div>

            <div class="form-group">
                <label for="politica_cancelamento">Política de Cancelamento <span class="required">*</span></label>
                <select id="politica_cancelamento" name="politica_cancelamento" required>
                    <option value="">{{ $informacao->politica_cancelamento }}</option>
                    <option value="flexivel">Flexível - Reembolso total até 24h antes</option>
                    <option value="moderada">Moderada - Reembolso total até 5 dias antes</option>
                    <option value="rigida">Rígida - Reembolso de 50% até 7 dias antes</option>
                    <option value="super_rigida">Super Rígida - Reembolso de 50% até 30 dias antes</option>
                    <option value="nao_reembolsavel">Não Reembolsável</option>
                </select>
            </div>

            <button type="submit" class="btn-submit">Atualizar Informações Basicas</button>
        </form>

        <div class="success-message" id="successMessage">
            ✅ Locação cadastrada com sucesso!
        </div>
    </div>
</body>
</html>
