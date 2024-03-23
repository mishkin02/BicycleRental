<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>605-01</title>
    <style> .is-invalid { color : red; }</style>
</head>
<body>
    @if($user)
        <h2>Здравствуйте, {{$user->name}}</h2>
        <a href="{{url('logout')}}">Выйти</a>
    @else
        <h2>Вход</h2>
        <form action="{{url('auth')}}" method="post">
        @csrf
            <label for="email">Почта:</label>
            <input type="email" name="email" value="{{old('email')}}">
            @error('email')
            <div class="is-invalid"> {{$message}}</div>
            @enderror

            <br><br>

            <label for="password">Пароль:</label>
            <input type="password" name="password" value="{{old('password')}}">
            @error('password')
            <div class="is-invalid"> {{$message}}</div>
            @enderror

            <br><br>
            
            <input type="submit">
        </form>
        @error('error')
            <div class="is-invalid">{{ $message }}</div>
        @enderror
    @endif
</body>
</html>