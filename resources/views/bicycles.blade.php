@extends('layout')
@section('content')
<h2 class="text-center">Список велосипедов</h2>
<div class="container-fluid d-flex  justify-content-center align-items-center">
    <div class="row justify-content-center">
        @foreach ($bicycles as $bicycle)
            <div class="col-{{12/$bicycles->perPage()}}">
                <div class="card text-center m-5" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Велосипед {{$bicycle->id}}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Модель {{$bicycle->bicycleModel->name}}</h6>
                        <p class="card-text">Местонахождение: {{$bicycle->location}}</p>
                        <p class="card-text">{{$bicycle->status ? "Доступен для проката" : "Не доступен для проката"}}</p>

                        <a class="btn btn-primary" href="{{url('bicycle/destroy/'.$bicycle->id)}}">Удалить</a>
                        <a class="btn btn-primary" href="{{url('bicycle/edit/'.$bicycle->id)}}">Изменить</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

{{ $bicycles->links() }}
@endsection