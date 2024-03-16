<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>605-01</title>
</head>
<body>
    <h2>Список моделей велосипедов</h2>
    <table>
        <thead>
            <td>id</td>
            <td>name</td>
            <td>rental_price_hour</td>
            <td>rental_price_day</td>
        </thead>
    @foreach ($bicycle_models as $bicycle_model)
        <tr>
            <td>{{$bicycle_model->id}}</td>
            <td>{{$bicycle_model->name}}</td>
            <td>{{$bicycle_model->rental_price_hour}}</td>
            <td>{{$bicycle_model->rental_price_day}}</td>
        </tr>
    @endforeach
    </table>
</body>
</html>