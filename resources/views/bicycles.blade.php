<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>605-01</title>
</head>
<body>
    <h2>Список велосипедов</h2>
    <table>
        <thead>
            <td>id</td>
            <td>Статус</td>
            <td>Модель</td>
        </thead>
        <tbody>
            @foreach ($bicycles as $bicycle)
                <tr>
                    <td>{{$bicycle->id}}</td>
                    <td>{{$bicycle->status ? "Доступен" : "Не доступен"}}</td>
                    <td>{{$bicycle->bicycleModel->name}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>