@extends('layout')
@section('content')
@if($user)
<h2 class="text-center">{{$user ? "Список аренд пользователя ".$user->first_name : "Неверный ID пользователя"}}</h2>
<div class="container-fluid d-flex  justify-content-center align-items-center">
    <div class="row justify-content-center">
        <div class="col-12">
            @foreach ($user->bicycles as $bicycle)
            <div class="card text-center m-5" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Велосипед {{$bicycle->id}}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Модель {{$bicycle->bicycleModel->name}}</h6>
                    <p class="card-text">Начало аренды: {{$bicycle->pivot->rental_date}}</p>
                    <p class="card-text">Конец аренды: {{$bicycle->pivot->return_date}}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif
@endsection