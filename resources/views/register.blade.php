@extends('layout')
@section('content')
<div class="container-fluid d-flex h-100 justify-content-center align-items-center m-5">
    <div class="row mt-4">
        <div class="col">
            <h2 class="text-center mb-4">Регистрация</h2>
            <form action="{{url('auth')}}" method="post" >
            @csrf
                <div class="form-outline mb-4">
                    <input type="text" class="form-control" name="first_name"  value="{{old('first_name')}}" placeholder="Имя"> 
                    @error('first_name')
                    <div class="is-invalid"> {{$message}}</div>
                    @enderror
                </div>

                <div class="form-outline mb-4">
                    <input type="text" class="form-control" name="last_name" value="{{old('last_name')}}" placeholder="Фамилия">
                    @error('last_name')
                    <div class="is-invalid"> {{$message}}</div>
                    @enderror
                </div>

                <div class="form-outline mb-4">
                    <input type="email" class="form-control" name="email" value="{{old('email')}}" placeholder="Почта">
                    @error('last_name')
                    <div class="is-invalid"> {{$message}}</div>
                    @enderror
                </div>

                <div class="form-outline mb-4">
                    <input type="phone" class="form-control" name="phone_number" value="{{old('phone_number')}}" placeholder="Номер телефона">
                    @error('phone_number')
                    <div class="is-invalid"> {{$message}}</div>
                    @enderror
                </div>

                <div class="form-outline mb-4">
                    <input type="password" class="form-control" name="password" value="{{old('password')}}" placeholder="Пароль">
                    @error('password')
                    <div class="is-invalid"> {{$message}}</div>
                    @enderror
                </div>
                
                <button type="submit" class="btn btn-primary w-100">Зарегестрироваться</button>
            </form>
            @error('error')
                <div class="is-invalid">{{ $message }}</div>
            @enderror
        </div>
    </div>    
</div>

@endsection







<!-- <form action="{{url('register')}}" method="post">
@csrf
    <label for="first_name">Имя:</label>
    <input type="text" name="first_name" value="{{old('first_name')}}">
    @error('first_name')
    <div class="is-invalid"> {{$message}}</div>
    @enderror

    <br><br>

    <label for="last_name">Фамилия:</label>
    <input type="text" name="last_name" value="{{old('last_name')}}">
    @error('last_name')
    <div class="is-invalid"> {{$message}}</div>
    @enderror

    <br><br>

    <label for="email">Почта:</label>
    <input type="email" name="email" value="{{old('email')}}">
    @error('email')
    <div class="is-invalid"> {{$message}}</div>
    @enderror

    <br><br>

    <label for="phone_number">Телефон:</label>
    <input type="phone" name="phone_number" value="{{old('phone_number')}}">
    @error('phone_number')
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
</form> -->