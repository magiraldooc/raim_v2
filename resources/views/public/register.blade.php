@extends('template.main')

@section('title', 'Crear Usuario')

@section('content')
<!-- 
    // cabezera del contenido
-->
  <div class="contentHeader">
        <h1>Crear Usuario</h1> 
  </div>

<!-- 
    //fin de la cabezera del contenido
-->
    
    {!! Form::open(['route'=> 'Public.store','method'=> 'POST']) !!}
        
        <div class="fieldForm">
            {!! Form::label('user_name','Nombre de Usuario') !!}
            {!! Form::text('user_name', null ,['class' => '', 'placeholder' => 'Nombre de Usuario','required']) !!}         
        </div>

        <div class="fieldForm">
            {!! Form::label('name','Nombre') !!}
            {!! Form::text('name', null ,['class' => '', 'placeholder' => 'Nombre','required']) !!}     

        </div>

        <div class="fieldForm">
            {!! Form::label('last_name','Apellido') !!}
            {!! Form::text('last_name', null ,['class' => '', 'placeholder' => 'Apellido','required']) !!}

        </div>

        <div class="fieldForm">
            {!! Form::label('email','Correo electrónico') !!}
            {!! Form::email('email', null ,['class' => '', 'placeholder' => 'exmple@gmail.com','required']) !!}         

        </div>
        
        <div class="fieldForm">
            {!! Form::label('institution','Institución') !!}
            {!! Form::text('institution', null ,['class' => '', 'placeholder' => '','required']) !!}           

        </div>
        <div class="fieldForm">
            {!! Form::label('birth_date','Fecha de Nacimiento') !!}
            {!! Form::date('birth_date', null, ['class' => '','required']) !!}     

        </div>
        <div class="fieldForm">
            {!! Form::label('language','Idioma') !!}
            {!! Form::text('language', null ,['class' => '', 'placeholder' => '','required']) !!}          

        </div>
        <div class="fieldForm">
            {!! Form::label('id_rol','Rol') !!}
            {!! Form::select('id_rol', $rol ,null, ['class' => '','required']) !!}         

        </div>

        <div class="fieldForm">
            {!! Form::label('password','Contraseña') !!}
            {!! Form::password('password', ['class' => '', 'placeholder' => '**********','required']) !!}           

        </div>



        <div class="buttonForm">
            {!! Form::submit('Registrar',['class' => '']) !!}
            <a href="{{ route('Public.index') }}">Cancelar</a>
        </div>



    {!! Form::close() !!}


@endsection