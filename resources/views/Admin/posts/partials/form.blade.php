{{--  label e input  --}}
<div class="form-group">                    
    {!! Form::label('name', 'Nombre:') !!}                    
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ing nombre']) !!} 
    
    {{--  msj de validación  --}}
    @error('name')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>

{{--  label e input  --}}
<div class="form-group">                    
    {!! Form::label('slug', 'Slug:') !!}                    
    {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Ing slug', 'readonly']) !!} 
    
    {{--  msj de validación  --}}
    @error('slug')
        <small>{{$message}}</small>
    @enderror
</div>

{{--  select  categorías--}}
<div class="form-group">                    
    {!! Form::label('category_id', 'Categoría') !!}                    
    {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}  
    
    {{--  msj de validación  --}}
    @error('category_id')
        <small>{{$message}}</small>
    @enderror
</div>

{{--  select etiquetas  --}}
<div class="form-group">
    <p class="font-weigth-bold">Etiquetas</p>
    @foreach ($tags as $tag)
        <label class="mr-2">
            
            {!! Form::checkbox('tags[]', $tag->id, null ) !!}{{--  esto es codigo  laravel Colective --}}
            {{$tag->name}}
            
        </label>
    @endforeach

    {{--  msj de validación  --}}
    @error('tags')
        <br>
        <small>{{$message}}</small>
    @enderror
</div>

{{--  con esta opción LE doy al user la posibilidad de q elija si lo publica o lo deja en borrador  --}}
<div class="form-group">
    <p class="font-weigth-bold">Estado</p>

    <label>                        
        {!! Form::radio('status', 1, true ) !!}
        Borrador
    </label>

    <label>                        
        {!! Form::radio('status', 2 ) !!}
        Publicado
    </label>

    {{--  msj de validación  --}}
    @error('status')
        <small>{{$message}}</small>
    @enderror
</div>



{{--  cargar img del post  --}}
{{--  creo una grilla con bootstrap-->es un div con la clase row Y por c/col un div(en este caso 2)  --}}
<div class="row mb-3">
    {{--  muestro img por defecto  --}}
    <div class="col">
        {{--  coloco la img dentro de un div para darle estilos --> LOS estilos CSS se escriben en LA SECCION de más abajo-->@section('css')  --}}
        <div class="image-wrapper">
            @isset ($post->image)
                <img id="picture" src="{{Storage::url($post->image->url)}}"/>
            @else    
                <img id="picture" src="https://cdn.pixabay.com/photo/2016/11/18/18/39/beach-1836335_1280.jpg" alt="img not found">
            @endif
            
        </div>                        
    </div>

    {{--  cargo img  --}}
    <div class="col">
        <div class="form-group">
            
            {!! Form::label('file', 'Elija una imagen') !!}                            
            {!! Form::file('file', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}                            

            {{--  msj de error  --}}
            @error('file')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>

</div>



{{--  extracto del post  --}}
<div class="form-group">                    
    {!! Form::label('extract', 'Extracto del Post:') !!}
    {!! Form::textarea('extract', null, ['class' => 'form-control']) !!}

    {{--  msj de validación  --}}
    @error('extract')
        <small>{{$message}}</small>
    @enderror
</div>

{{--  cuerpo del post  --}}
<div class="form-group">                    
    {!! Form::label('body', 'Cuerpo del Post:') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}

    {{--  msj de validación  --}}
    @error('body')
        <small>{{$message}}</small>
    @enderror
</div>