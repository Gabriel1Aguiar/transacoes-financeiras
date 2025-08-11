<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transações Financeiras</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <style>
        body, html {
            margin: 0; padding: 0; height: 100%;
            font-family: Arial, sans-serif;
            background-color: #f5f7fa;
        }

        .container {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 100px;
            background-color: #0c0c0c;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 20px;
        }
        .sidebar span {           
            font-weight: 600;
            letter-spacing: 1.5px;
            font-size: 14px;
            cursor: default;
        }

        .main-content {
            flex: 1;
            padding: 30px 40px;
        }


        .btn-create {
            background-color: #0a0a0a;
            color: white;
            border: none;
            padding: 10px 22px;
            border-radius: 20px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-bottom: 20px;
        }
        .btn-create:hover {
            background-color: #222222;
        }

        .btn{
            border:none;
            outline: none;
            background-color: #0a0a0a;
            color: #f5f7fa;
        }

        .btn:hover{
            background-color: #222222;
        }

        .transacoes-list {
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 5px rgb(0 0 0 / 0.1);
            padding: 15px 0;
        }

        .transacao-item {
            padding: 15px 30px;
            border-bottom: 1px solid #ddd;
            font-size: 16px;
            color: #444;
            cursor: default;
        }
        .transacao-item:last-child {
            border-bottom: none;
        }
        </style>

    <header>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} - Meu Sistema</p>
    </footer>
</body>
</html>
