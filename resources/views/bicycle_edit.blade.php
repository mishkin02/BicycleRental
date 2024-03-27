@extends('layout')
@section('content')
<form action="{{url('bicycle/update/'.$bicycle->id)}}/" method="post">
@csrf
<div class="container-fluid d-flex justify-content-center align-items-center m-5">
    <div class="row">
        <div class="col">
            <h2 class="text-center">Редактирование велосипеда № {{$bicycle->id}}</h2>
            <form action="{{url('bicycle/update/'.$bicycle->id)}}/" method="post">
                @csrf
                <div class="m-4">
                    <label class="form-label" for="form-check">Доступен сейчас для проката?</label>
                    <div class="form-check">
                        <label class="form-check-label" for="status_choice1" >Да</label>
                        <input type="radio" class="form-check-input" name="status" value=1
                            @if (old('status'))
                                @if( old('status') == true ) 
                                checked 
                                @endif
                            @else 
                                @if( $bicycle->status == true ) 
                                checked 
                                @endif
                            @endif />
                    </div>
                    
                    <div class="form-check">
                        <label class="form-check-label" for="status_choice2">Нет</label>
                        <input type="radio" class="form-check-input" name="status" value=0
                            @if (old('status'))
                                @if( old('status') == false ) 
                                checked 
                                @endif
                            @else 
                                @if ($bicycle->status == false)
                                checked 
                                @endif
                            @endif />
                                
                        @error('status')
                        <div class="is-invalid">{{ $message }}</div> 
                        @enderror
                    </div>
                </div>

                <div class="m-4">
                    <label class="form-label" for="model_id">Модель</label>
                    <select class="form-select" name="model_id" value="{{old('model_id')}}">
                        @foreach ($models as $model)
                            <option value="{{$model->id}}"
                                @if(old('model_id'))
                                    @if(old('model_id')) == $model->id) selected 
                                    @endif
                                @else
                                    @if($model->id == $bicycle->bicycle_model_id) selected
                                    @endif
                                @endif
                                >
                                {{$model->name}}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form m-4">
                    <label class="form-label" for="location">Местонахождение</label>
                    <input class="form-control" type="text" name="location" value="@if (old('location')) {{old('location')}} @else {{$bicycle->location}} @endif ">
                    @error('location')
                    <div class="is-invalid">{{ $message }}</div> 
                    @enderror
                </div>
                
                <button type="submit" class="btn btn-primary w-100">Изменить</button>
            </form>
            @error('error')
                <div class="is-invalid">{{ $message }}</div>
            @enderror
        </div>
    </div>    
</div>
@endsection