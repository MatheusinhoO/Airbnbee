<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Informações Básicas (v2)</title>
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
        textarea,
        input[type="date"],
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
        textarea:focus,
        input[type="date"]:focus,
        select:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        input[type="text"]:hover,
        textarea:hover,
        input[type="date"]:hover,
        select:hover {
            border-color: #b0b0b0;
        }

        textarea {
            resize: vertical;
            min-height: 80px;
        }

        .checkbox-group {
            margin-bottom: 10px;
        }

        .checkbox-item {
            display: flex;
            align-items: center;
            margin-bottom: 5px;
        }

        .checkbox-item input[type="checkbox"] {
            margin-right: 10px;
            width: 18px;
            height: 18px;
            accent-color: #667eea;
        }

        .checkbox-item label {
            margin-bottom: 0;
            font-weight: normal;
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
        <h1>📝 Informações Básicas da Locação</h1>
        <p class="subtitle">Descreva sua propriedade para os hóspedes</p>
        
        <form action="{{ route('alterar_detalhe') }}" method="POST">
        @csrf

        <input type="text" class="d-none" name="id_detalhe" id="id_detalhe" value={{ $detalhe->id }}>

            <div class="form-group">
                <label for="titulo">Título do Anúncio <span class="required">*</span></label>
                <input type="text" id="titulo" name="titulo" placeholder="Ex: Apartamento aconchegante no centro" value="{{ $detalhe->titulo }}">
            </div>

            <div class="form-group">
                <label for="descricao">Descrição Detalhada <span class="required">*</span></label>
                <textarea id="descricao" name="descricao" rows="5" placeholder="Descreva sua propriedade, o que a torna especial, a vizinhança, etc.">{{ $detalhe->descricao }}</textarea>
            </div>

            <div class="form-group">
                <label for="destaques">Destaques (separados por vírgula)</label>
                <input type="text" id="destaques" name="destaques" placeholder="Ex: Piscina, Wi-Fi rápido, Vista para o mar" value="{{ $detalhe->titulo }}">
            </div>

            <div class="form-group">
                <label for="comodidade_oferecidas">Comodidades Oferecidas <span class="required">*</span></label>
                <select id="comodidade_oferecidas" name="comodidade_oferecidas" required>
                    <option value="">{{ $detalhe->comodidade_oferecidas }}</option>
                    <option value="wi-fi">Wi-fi</option>
                    <option value="ar_condicionados">Ar-condicionado</option>
                    <option value="cozinha">Cozinha Completa</option>
                    <option value="maquina_lavar">Máquina de Lavar</option>
                    <option value="tv_cabo">Tv a Cabo</option>
                    <option value="estacionamento">Estacionamento Gratuito</option>
                </select>
            </div>

            <div class="form-group">
                <label for="permite_fumar">Permite Fumar <span class="required">*</span></label>
                <select id="permite_fumar" name="permite_fumar" required>
                    <option value="">{{ $detalhe->permite_fumar }}</option>
                    <option value="sim">Sim</option>
                    <option value="nao">Não</option>
                </select>
            </div>

            <div class="form-group">
                <label for="permite_festa">Permite Festas/Eventos <span class="required">*</span></label>
                <select id="permite_festa" name="permite_festa" required>
                    <option value="">{{ $detalhe->permite_festa}}</option>
                    <option value="sim">Sim</option>
                    <option value="nao">Não</option>
                </select>
            </div>

            <div class="form-group">
                <label for="permite_animais">Permite Animais de Estimação <span class="required">*</span></label>
                <select id="permite_animais" name="permite_animais" required>
                    <option value="">{{ $detalhe->permite_animais}}</option>
                    <option value="sim">Sim</option>
                    <option value="nao">Não</option>
                </select>
            </div>

            <div class="form-group">
                <label for="horario_check_in">Data de Check-in <span class="required">*</span></label>
                <input type="date" id="horario_check_in" name="horario_check_in"  value="{{ $detalhe->horario_check_in }}">
            </div>

            <div class="form-group">
                <label for="horario_check_out">Data de Check-out <span class="required">*</span></label>
                <input type="date" id="horario_check_out" name="horario_check_out"  value="{{ $detalhe->horario_check_out }}">
            </div>

            <button type="submit" class="btn-submit">Atualizar Detalhes da Comodação</button>
        </form>

        <div class="success-message" id="successMessage">
            ✅ Informações básicas cadastradas com sucesso!
        </div>
    </div>
</body>
</html>
