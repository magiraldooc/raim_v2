<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return redirect()->route('Public.index');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
	Route::group(['middleware' => ['web','auth','administrador'],'prefix' => 'Admin'],function(){

		Route::get('/', function () {
		    return view('admin.index');
		});


		Route::resource('Rol','RolController');
			Route::get('Rol/{id}/delete',[
				'uses' 	=> 'RolController@delete',
				'as'	=> 'Admin.Rol.delete'
			]);
		
		Route::resource('User','UserController');
			Route::get('User/{id}/delete',[
				'uses' 	=> 'UserController@delete',
				'as'	=> 'Admin.User.delete'
			]);
		
		Route::resource('Aplication','AplicationController');
			Route::get('Aplication/{id}/delete',[
				'uses' 	=> 'AplicationController@delete',
				'as'	=> 'Admin.Aplication.delete'
			]);
		
		Route::resource('Table','TableController');
			Route::get('Table/{id}/delete',[
				'uses' 	=> 'TableController@delete',
				'as'	=> 'Admin.Table.delete'
			]);
		
		Route::resource('Option','OptionController');
			Route::get('Option/{id}/delete',[
				'uses' 	=> 'OptionController@delete',
				'as'	=> 'Admin.Option.delete'
			]);
		
		Route::resource('TypeField','TypeFieldController');
			Route::get('TypeField/{id}/delete',[
				'uses' 	=> 'TypeFieldController@delete',
				'as'	=> 'Admin.TypeField.delete'
			]);
		
		Route::resource('FieldTable','FieldTableController');
			Route::get('FieldTable/{id}/delete',[
				'uses' 	=> 'FieldTableController@delete',
				'as'	=> 'Admin.FieldTable.delete'
			]);
		Route::resource('FieldUser','FieldUserController');
			Route::get('FieldUser/{id}/delete',[
				'uses' 	=> 'FieldUserController@delete',
				'as'	=> 'Admin.FieldUser.delete'
			]);
			Route::get('FieldUser/{id}/EditApps',[
				'uses' 	=> 'FieldUserController@editApps',
				'as'	=> 'Admin.FieldUser.EditApps'
			]);
			Route::POST('FieldUser/updateAll',[
				'uses' 	=> 'FieldUserController@updateAll',
				'as'	=> 'Admin.FieldUser.UpdateAll'
			]);
			Route::POST('FieldUser/data',[
				'uses' 	=> 'FieldUserController@data',
				'as'	=> 'Admin.FieldUser.data'
			]);





	});


	Route::group(['middleware' => ['web','auth','estudiante'],'prefix' => 'Estudiante' ],function(){

		
		Route::get('/listAplications',[
				'uses' 	=> 'EstudianteController@IndexAplication',
				'as'	=> 'Estudiante.listAplications'
			]);
		Route::get('/',[
				'uses' 	=> 'EstudianteController@index',
				'as'	=> 'Estudiante.index'
			]);
		Route::get('/{id_user}',[
				'uses' 	=> 'EstudianteController@show',
				'as'	=> 'Estudiante.show'
			]);
		Route::get('/{FieldUser}/edit',[
				'uses' 	=> 'EstudianteController@edit',
				'as'	=> 'Estudiante.edit'
			]);
		Route::put('/{user}',[
				'uses' 	=> 'EstudianteController@update',
				'as'	=> 'Estudiante.update'
			]);
		Route::get('/{id}/EditApps',[
				'uses' 	=> 'EstudianteController@editApps',
				'as'	=> 'Estudiante.EditApps'
			]);
		Route::POST('/updateAll',[
				'uses' 	=> 'EstudianteController@updateAll',
				'as'	=> 'Estudiante.UpdateAll'
			]);


		

	});

	Route::group(['middleware' => ['web','auth','creador'],'prefix' => 'Creador'],function(){

		Route::get('/',[
				'uses' 	=> 'CreadorController@index',
				'as'	=> 'Creador.index'
			]);
		Route::get('/{id_user}',[
				'uses' 	=> 'CreadorController@show',
				'as'	=> 'Creador.show'
			]);
		Route::get('/{FieldUser}/edit',[
				'uses' 	=> 'CreadorController@edit',
				'as'	=> 'Creador.edit'
			]);
		Route::put('/{user}',[
				'uses' 	=> 'CreadorController@update',
				'as'	=> 'Creador.update'
			]);
		Route::get('/{id}/EditApps',[
				'uses' 	=> 'CreadorController@editApps',
				'as'	=> 'Creador.EditApps'
			]);
		Route::POST('/updateAll',[
				'uses' 	=> 'CreadorController@updateAll',
				'as'	=> 'Creador.UpdateAll'
			]);
		//Route::patch($uri, $callback);
		//Route::delete($uri, $callback);


	});

	Route::group(['prefix' => 'Public'],function(){

		Route::get('/',[
			'uses' 	=> 'PublicController@index',
			'as'	=> 'Public.index'
		]);

		Route::get('/objectives',[
			'uses' 	=> 'PublicController@objectives',
			'as'	=> 'Public.objectives'
		]);
		
		Route::get('/advisers',[
			'uses' 	=> 'PublicController@advisers',
			'as'	=> 'Public.advisers'
		]);

		Route::get('/reporting',[
			'uses' 	=> 'PublicController@reporting',
			'as'	=> 'Public.reporting'
		]);

		Route::get('/publications',[
			'uses' 	=> 'PublicController@publications',
			'as'	=> 'Public.publications'
		]);

		Route::get('/searchOa',[
				'uses' 	=> 'PublicController@searchOa',
				'as'	=> 'Public.searchOa'
			]);

		Route::get('/listAplications',[
				'uses' 	=> 'PublicController@IndexAplication',
				'as'	=> 'Public.listAplications'
			]);

		Route::get('/Regirter',[
				'uses' 	=> 'PublicController@register',
				'as'	=> 'Public.Register'
			]);
		Route::post('/store',[
				'uses' 	=> 'PublicController@store',
				'as'	=> 'Public.store'
			]);
		Route::get('/create',[
				'uses' 	=> 'PublicController@create',
				'as'	=> 'Public.create'
			]);
		Route::get('/{id_user}',[
				'uses' 	=> 'PublicController@show',
				'as'	=> 'Public.show'
			]);
		Route::post('/storeAll',[
				'uses' 	=> 'PublicController@storeAll',
				'as'	=> 'Public.storeAll'
			]);
	});
		


	Route::group(['middleware' => 'web'], function () {
	    Route::auth();

	    Route::get('/home', 'HomeController@index');
	});
