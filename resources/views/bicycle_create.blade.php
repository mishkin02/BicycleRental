<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>605-01</title>
    <style> .is-invalid {color: red; }</style>
</head>
<body>
    <h2>Добавление велосипеда</h2>
    <form action="{{url('bicycle')}}" method="post">
    @csrf
        <legend for="">Доступен сейчас для проката?</label>
        <br>
        <label for="status_choice1" >Да</label>
        <input type="radio" name="status" value=1
            @if( old('status') == true ) 
                selected 
            @endif>
    
        <br>
    
        <label for="status_choice2">Нет</label>
        <input type="radio" name="status" value=0
            @if( old('status') == false ) 
                selected 
            @endif>
                
        @error('status')
        <div class="is-invalid">{{ $message }}</div> 
        @enderror

        <br><br>

        <label for="model_id">Модель</label>
        <select name="model_id" value="{{old('model_id')}}">
            @foreach ($models as $model)
                <option value="{{$model->id}}"
                    @if(old('model_id') == $model->id) selected 
                    @endif>
                    {{$model->name}}
                </option>
            @endforeach
        </select>
        @error('model_id')
        <div class="is-invalid">{{ $message }}</div> 
        @enderror

        <br><br>
        
        <label for="location">Местонахождение</label>
        <input type="text" name="location" value="{{old('location')}}">
        @error('location')
        <div class="is-invalid">{{ $message }}</div> 
        @enderror

        <br><br>
        
        <input type="submit" text="Отправить">
    </form>
</body>
</html>