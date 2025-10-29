@extends('layouts.navigation')

@section('title', 'pagina_pirncipal')

@section('body')
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AirBnBee - Encontre seu lugar perfeito</title>
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
        
        
        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .logo h1 {
            font-size: 1.8rem;
            font-weight: 700;
        }
        
        .logo-icon {
            font-size: 1.5rem;
        }
        
        nav ul {
            display: flex;
            list-style: none;
            gap: 1.5rem;
        }
        
        nav a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: opacity 0.3s;
        }
        
        nav a:hover {
            opacity: 0.8;
        }
        
        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1rem;
        }
        
        .page-title {
            margin-bottom: 2rem;
            text-align: center;
        }
        
        .page-title h2 {
            font-size: 2rem;
            color: #333;
            margin-bottom: 0.5rem;
        }
        
        .page-title p {
            color: #666;
            font-size: 1.1rem;
        }
        
        .properties-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2rem;
        }
        
        .property-card {
            background-color: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .property-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.12);
        }
        
        .property-image {
            height: 200px;
            background-color: #e0e0e0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #888;
            font-weight: 500;
        }
        
        .property-info {
            padding: 1.5rem;
        }
        
        .property-address {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: #333;
        }
        
        .property-availability {
            background-color: #f0f8f0;
            color: #2e7d32;
            padding: 0.5rem;
            border-radius: 6px;
            font-size: 0.9rem;
            margin-bottom: 1rem;
            text-align: center;
        }
        
        .property-actions {
            display: flex;
            gap: 0.5rem;
        }
        
        .btn {
            padding: 0.75rem 1rem;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s;
            flex: 1;
            text-align: center;
            text-decoration: none;
            display: inline-block;
        }
        
        .btn-primary {
            background-color: #ffee02;
            color: white;
        }
        
        .btn-primary:hover {
            background-color: #ffee02;
        }
        
        .btn-secondary {
            background-color: #f0f0f0;
            color: #333;
        }
        
        .btn-secondary:hover {
            background-color: #e0e0e0;
        }
        
        footer {
            background-color: #333;
            color: white;
            padding: 3rem 2rem;
            margin-top: 4rem;
        }
        
        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
        }
        
        .footer-section h3 {
            margin-bottom: 1.5rem;
            font-size: 1.2rem;
        }
        
        .footer-section ul {
            list-style: none;
        }
        
        .footer-section li {
            margin-bottom: 0.75rem;
        }
        
        .footer-section a {
            color: #ddd;
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .footer-section a:hover {
            color: white;
        }
        
        .copyright {
            text-align: center;
            margin-top: 3rem;
            padding-top: 1.5rem;
            border-top: 1px solid #555;
            color: #aaa;
        }
        
        @media (max-width: 768px) {
            .header-container {
                flex-direction: column;
                gap: 1rem;
            }
            
            nav ul {
                gap: 1rem;
            }
            
            .properties-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            }
        }
        
        @media (max-width: 480px) {
            .properties-grid {
                grid-template-columns: 1fr;
            }
        }
        
        .no-properties {
            text-align: center;
            padding: 3rem;
            color: #666;
        }
        
        .no-properties h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    
    <main class="container">
        <div class="page-title">
            <h2>Encontre seu lugar perfeito</h2>
            <p>Descubra espaços únicos para sua próxima viagem</p>
        </div>

        <form action="{{route('mostra_locacao_filtro')}}" method="POST">
            @csrf
            <div>
                <div class="row justify-content-center">
                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <label for="sua_locacao">sua locação</label>
                        <input type="text" class="form-control form-control-sm" name="sua_locacao" id="sua_locacao">
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-12 ms-1">
                        <label for=""></label>
                        <button type="submit" class="btn btn-sm btn-danger mt-2">Filtrar</button>
                    </div>
                </div>
            </div>
        </form>

            <br>
        
        <div class="properties-grid">
            @foreach($locacao as $i)
            <div class="property-card">
                <div class="property-image">
                    <img src="casa2.jpg" alt="">
                </div>
                <div class="property-info">
                    <img src="{{ asset($i->Imagem) }}" alt="">
                    <h3 class="property-address">{{ $i->endereco }}</h3>
                    <div class="property-availability">
                        Disponível: {{ $i->calendario_disponibilidade }}
                    </div>
                    <div class="property-actions">
                        <a href="#" class="btn btn-primary">Reservar</a>
                        <a href="#" class="btn btn-secondary">Detalhes</a>
                    </div>
                </div>
            </div>
            @endforeach
      
            @if(count($locacao) === 0)
            <div class="no-properties">
                <h3>Nenhuma propriedade encontrada</h3>
                <p>Tente ajustar seus filtros de busca</p>
            </div>
            @endif
        </div>
    </main>

</body>
</html>
@endsection
