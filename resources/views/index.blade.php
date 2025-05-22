<!DOCTYPE html>
<html lang="pt-BR">
<head>        
    <title>Opportune - Conectando Talentos à Tecnologia</title>            
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />

    <style>
        body {
            margin: 0;
            padding: 0;
            background: #f5f5f5;
            font-family: Arial, sans-serif;
        }

        header {
            background-color: #17a2b8;
            color: white;
            padding: 20px 0;
            text-align: center;
        }

        .hero {
            text-align: center;
            padding: 60px 20px;
            background-color: #ffffff;
        }

        .hero h1 {
            font-size: 32px;
            margin-bottom: 20px;
            color: #333;
        }

        .hero p {
            font-size: 16px;
            color: #666;
            max-width: 600px;
            margin: 0 auto;
        }

        .actions {
            margin-top: 30px;
        }

        .actions a {
            text-decoration: none;
            margin: 0 10px;
            padding: 12px 24px;
            background-color: #17a2b8;
            color: white;
            border-radius: 4px;
            font-size: 14px;
            transition: background 0.3s;
        }

        .actions a:hover {
            background-color: #138496;
        }

        .vagas-section {
            background: #fff;
            padding: 40px 20px;
        }

        .vagas-section h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        .vaga-card {
            background: #f9f9f9;
            border: 1px solid #e0e0e0;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }

        .vaga-card h3 {
            margin-top: 0;
            color: #17a2b8;
        }

        .vaga-card p {
            margin: 5px 0;
            color: #555;
        }

        footer {
            background: #f0f0f0;
            text-align: center;
            padding: 15px;
            font-size: 13px;
            color: #666;
        }

        @media (max-width: 768px) {
            .hero h1 {
                font-size: 24px;
            }

            .actions a {
                display: block;
                margin: 10px auto;
            }
        }
    </style>
</head>
<body>

    @include('header')
    
    
    

<section class="hero">
    <h1>Encontre ou ofereça oportunidades nas áreas Disponíveis</h1>
    <p>O Opportune é o seu portal de vagas especializado em TI. Se você está procurando talentos ou buscando uma nova colocação, está no lugar certo.</p>
    <div class="actions">
        <a href="{{ url('/register') }}">Cadastrar-se</a>
        <a href="{{ url('/') }}">Entrar</a>
    </div>
</section>

<!-- ... seções anteriores ... -->

<section class="vagas-section">
    <h2>Vagas em Destaque</h2>

    {{-- Exemplo de vaga estática --}}
    @foreach ($getRecord as $record)
        
    <div class="vaga-card">
        <h3>{{$record->titulo}}</h3>
        <p><strong>Empresa:</strong> <td>{{ $record->creator->name ?? 'Desconhecido' }}</td>
        </p>
        <p><strong>Nível:</strong> {{$record->nivel}}</p>
        <p><strong>Modalidade:</strong> {{$record->modalidade}}</p>
        <p><strong>Descrição:</strong> {{$record->requisito}}</p>
        <p><strong>Estimado:</strong> {{$record->salario}} Kzs</p>
        <p><strong>Válido até:</strong> {{$record->data_expire}}</p>
        <a href="{{ url('/') }}" 
           style="display:inline-block; margin-top:10px; background:#28a745; color:#fff; padding:8px 16px; border-radius:4px; text-decoration:none;">
            Candidatar-se
        </a>
    </div>
    @endforeach
<!-- ... footer ... -->


<footer>
    &copy; {{ date('Y') }} Opportune - Todos os direitos reservados.
</footer>

</body>
</html>
