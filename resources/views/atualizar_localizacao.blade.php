<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Localização</title>
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
        textarea,
        select {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 15px;
            transition: all 0.3s ease;
            background: white;
        }

        input[type="text"]:focus,
        input[type="date"]:focus,
        input[type="number"]:focus,
        textarea:focus,
        select:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        input[type="text"]:hover,
        input[type="date"]:hover,
        input[type="number"]:hover,
        textarea:hover,
        select:hover {
            border-color: #b0b0b0;
        }

        textarea {
            resize: vertical;
            min-height: 80px;
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

            h1 {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>📍 Cadastro de Localização</h1>
        <p class="subtitle">Insira os detalhes da localização e acesso</p>
        
        <form action="{{ route('alterar_localizacao')}}" method="POST">
        @csrf
            <div class="form-group">
                <label for="endereco">Endereço Completo </label>
                <input type="text" id="endereco" name="endereco" value="{{ $locacao->endereco }}"  required>
            </div>
           

            <div class="form-group">
                <label for="entrega_chave_metodo">Método de Entrega da Chave <span class="required">*</span></label>
                <select id="entrega_chave_metodo" name="entrega_chave_metodo" required>
                    <option value="">{{ $locacao->entrega_chave_metodo}}.</option>
                    <option value="pessoalmente">Pessoalmente</option>
                    <option value="caixa_seguranca">Caixa de Segurança (Lockbox)</option>
                    <option value="codigo_porta">Código de Porta Eletrônica</option>
                    <option value="portaria">Portaria</option>
                    <option value="outro">Outro (especificar nas informações adicionais)</option>
                </select>
            </div>


             <input type="text" class="d-none" name="id_localizacao" id="id_localizacao" value={{ $locacao->id }}>

            <div class="form-group">
                <label for="informacao_estacionamento">Informações de Estacionamento</label>
                <textarea id="informacao_estacionamento" name="informacao_estacionamento" rows="3" placeholder="Ex: Vaga nº 10, estacionamento coberto, permitido 1 carro.">{{ $locacao->informacao_estacionamento}}</textarea>
            </div>

            <div class="form-group">
                <label for="calendario_disponibilidade">Calendario de Disponibilidade apartir de <span class="required">*</span></label>
                <input type="date" id="calendario_disponibilidade" name="calendario_disponibilidade" required>{{ $locacao->calendario_disponibilidade}}
            </div>

            <div class="form-group">
                <label for="duracao_estadia">Duração Mínima da Estadia (noites)</label>
                <input type="number" id="duracao_estadia" name="duracao_estadia" min="1" placeholder="{{ $locacao->duracao_estadia}}">
            </div>

            <button type="submit" class="btn-submit">Atualizar Localização</button>
        </form>

        <div class="success-message" id="successMessage">
            ✅ Localização cadastrada com sucesso!
        </div>
    </div>

   
</body>
</html>
