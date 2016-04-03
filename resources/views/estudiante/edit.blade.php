@extends('template.main')

@section('title', 'Editar Usuario')

@section('content')
<!-- 
	// cabezera del contenido
-->
  <div class="contentHeader">
  		<h1>Editar Usuario</h1> 
  </div>

<!-- 
	//fin de la cabezera del contenido
-->
	
	{!! Form::open(['route' => ['Estudiante.update', $user], 'method'=> 'PUT']) !!}
		

		<div class="fieldForm">
			{!! Form::label('name','Nombre') !!}
			<br>
			{!! Form::text('name', $user->name ,['class' => '', 'placeholder' => 'Nombre','required']) !!}		

		</div>

		<div class="fieldForm">
			{!! Form::label('last_name','Apellido') !!}
			<br>
			{!! Form::text('last_name', $user->last_name ,['class' => '', 'placeholder' => 'Apellido','required']) !!}

		</div>

		<div class="fieldForm">
			{!! Form::label('email','Correo Electronico') !!}
			<br>
			{!! Form::email('email', $user->email ,['class' => '', 'placeholder' => 'exmple@gmail.com','required']) !!}			

		</div>

		<div class="fieldForm">
			{!! Form::label('institution','Institucion') !!}
			{!! Form::text('institution', $user->institution ,['class' => '', 'placeholder' => '','required']) !!}			

		</div>

		<div class="fieldForm">
			{!! Form::label('birth_date','Fecha de Nacimiento') !!}
			{!! Form::date('birth_date', $user->birth_date, ['class' => '','required']) !!}		

		</div>

		<div class="fieldForm">
			{!! Form::label('language','Idioma') !!}
			{!! Form::text('language', $user->language ,['class' => '', 'placeholder' => '','required']) !!}			

		</div>

		<div class="fieldForm">
			{!! Form::label('id_rol','Rol') !!}
			<br>
			{!! Form::select('id_rol',$roles ,$user_rol->id, array('disabled'),['class' => '','required']) !!}			

		</div>

		<div class="buttonForm">
			{!! Form::submit('Siguiente',['class' => '']) !!}
			<a href="{{ route('Estudiante.index') }}">Cancelar</a>
		</div>



	{!! Form::close() !!}


@endsection