{{--  creo formulario Con Laravel colective  no ac falta especificar el methot POST, ni el csrf--}}
            

{{--  nombre  --}}
<div class="form-group">
    {!! Form::label('name', 'Nombre:') !!}                    
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ing nombre etiqueta...']) !!}                    
</div>   
@error('nema')
    <small class="text-danger">{{message}}</small>
@enderror


{{--  slug  --}}
<div class="form-group">
    {!! Form::label('slug', 'Slug:') !!}                    
    {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Ing slug etiqueta...', 'readonly']) !!}                    
</div> 
@error('slug')
    <small class="text-danger">{{message}}</small>
@enderror


{{--  select creado con laravel colective  --}}
<div class="form-group">
    {{--  <label for="">Color:</label>

    <select name="color" id="" class="form-control">
        <option value="red">Rojo</option>
        <option value="green">Verde</option>
        <option value="blue" selected>Azul</option>
    </select>  --}}

    {{--  hago lo mismo q arriba(html) PERO con Laravel Colective --}}
    {!! Form::label('color', 'Color') !!}
    
    {!! Form::select('color', $colors, null, ['class' => 'form-control']) !!}
    
    
</div>
@error('color')
    <small class="text-danger">{{message}}</small>
@enderror