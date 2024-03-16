<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>605-01</title>
</head>
<body>
    <h2>{{$bicycle_model ? "Список велосипедов модели ".$bicycle_model->name : 'Неверный id модели'}}</h2>
    @if($bicycle_model)
    <table>
        <thead>
            <tr>
                <td>id</td>
                <td>status</td>
            </tr>  
        </thead>

        <tbody>
            @foreach ($bicycle_model->bicycles as $bicycle)
                <tr>
                    <td>{{$bicycle->id}}</td>
                    <td>{{$bicycle->status ? "Доступен" : "Не доступен"}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</body>
</html>