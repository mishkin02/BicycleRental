<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>605-01</title>
</head>
<body>
    <h2>{{$user ? "Список аренд пользователя ".$user->first_name : "Неверный ID пользователя"}}</h2>
    @if($user)
    <table>
        <thead>
            <tr>
                <td>id</td>
                <td>model id</td>
                <td>status</td>
                <td>rental date</td>
                <td>renturn date</td>
            </tr>
        </thead>

        @foreach ($user->bicycles as $bicycle)
            <tr>
                <td>{{$bicycle->id}}</td>
                <td>{{$bicycle->bicycleModel->name}}</td>
                <td>{{$bicycle->status ? "Доступен" : "Не доступен"}}</td>
                <td>{{$bicycle->pivot->rental_date}}</td>
                <td>{{$bicycle->pivot->return_date}}</td>
        
            </tr>
        @endforeach
    </table>
    @endif
</body>
</html>