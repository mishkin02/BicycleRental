@extends('layout')
@section('content')
<div class="container-fluid d-flex h-100 justify-content-center align-items-center m-5">
    <div class="row mt-4">
        <div class="col">
            <h2 class="text-center mb-4">Вход</h2>
            <form action="{{url('auth')}}" method="post" >
            @csrf
                <div class="form-outline mb-4">
                    <input type="email" class="form-control" name="email"  value="{{old('email')}}" aria-describedby="emailHelp" placeholder="Почта"> 
                    @error('email')
                    <div class="is-invalid"> {{$message}}</div>
                    @enderror
                </div>

                <div class="form-outline mb-4">
                    <input type="password" class="form-control" name="password" value="{{old('password')}}" placeholder="Пароль">
                    @error('password')
                    <div class="is-invalid"> {{$message}}</div>
                    @enderror
                </div>
                
                <button type="submit" class="btn btn-primary w-100">Войти</button>
            </form>
            @error('error')
                <div class="is-invalid">{{ $message }}</div>
            @enderror
        </div>
    </div>    
</div>

@endsection