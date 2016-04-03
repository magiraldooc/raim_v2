@extends('template.main')

@section('title', 'Editar Aplicacion ')

@section('content')

<!-- 
	// cabezera del contenido
-->
  <div class="contentHeader">
  		<h1>Editar Aplicacion</h1> 
  </div>

<!-- 
	//fin de la cabezera del contenido
--> 
	
	{!! Form::open(['route' => ['Admin.Aplication.update', $aplication], 'files' => true, 'method'=> 'PUT']) !!}
		
		<div class="fieldForm">

			{!! Form::label('name','Nombre') !!}

			{!! Form::text('name', $aplication->name ,['class' => '', 'placeholder' => 'Nombre Del Rol','required']) !!}

		</div>

		<div class="fieldForm">

			{!! Form::label('description','Descripcion') !!}

			{!! Form::textarea('description', $aplication->description ,['class' => '']) !!}

		</div>

		<div class="fieldForm">

			{!! Form::label('url','Url') !!}

			{!! Form::text('url', $aplication->url ,['class' => '']) !!}

		</div>

		<div class="fieldForm">
			{!! Form::label('type','Tipo') !!}
			{!! Form::select('type',['Herramienta_Autor'=> 'Herramienta de Autor', 'Repositorio'=> 'Repositorio'], $aplication->type, ['class' => '', 'required']) !!}			
		</div>

		<div class="fieldForm">
			{!! Form::label('state','Estado') !!}
			{!! Form::select('state',['Activo'=> 'Activo', 'Inactivo'=> 'Inactivo'], $aplication->state, ['class' => '', 'required']) !!}			
		</div>

		<div class="fieldForm">
			{!! Form::label('rquiered_information','Requiere Informacion') !!}
			{!! Form::select('rquiered_information',['True'=> 'Si', 'False'=> 'No'], $aplication->rquiered_information, ['class' => '', 'required']) !!}			
		</div>

		<div class="fieldForm">
			{!! Form::label('logo','logo') !!}
			{!! Form::file('logo') !!}			

		</div>

		<div class="buttonTable">
			{!! Form::submit('Guardar',['class' => '']) !!}
			<a href="{{ route('Admin.Aplication.index') }}">Cancelar</a>
			
		</div>


	{!! Form::close() !!}

@endsection