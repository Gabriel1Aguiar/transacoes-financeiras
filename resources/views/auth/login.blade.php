<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <title>Login</title>
    <style>
        h1,form{
            text-align:center;
        }
    </style>
</head>
<body>
    <h1>Login</h1>

    <form method="POST" action="{{ route('login.process') }}">
        @csrf
        <label for="email">Email:</label>
            <input type="email" id="email" name="email" required value="{{ old('email') }}" />
        <br><br>
        <label for="password">Senha:</label>
        <input type="password" id="password" name="password" required />
        <br><br>
        <button type="submit">Login</button>
        @if ($errors->has('message'))
            <div style="color: red;">
                {{ $errors->first('message') }}
            </div>
        @endif
    </form>
</body>
</html>
