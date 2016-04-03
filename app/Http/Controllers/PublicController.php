<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\FieldUser;
use App\Aplication;
use App\Table;
use App\TypeField;
use App\FieldTable;
use App\Option;
use App\User;
use App\Rol;

class PublicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('public.home');
    }

    public function IndexAplication()
    {
        $aplications = Aplication::all();

        return view('public.aplications')->with('aplications', $aplications);
    }

    public function register()
    {
     
        //$rol = Rol::orderBy('name','ASC')->lists('name', 'id');
        $rol = Rol::where('id', '<>', 1)->orderBy('name','ASC')->lists('name', 'id');       
        return view('public.register')->with('rol', $rol);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user  = new User($request->all());
        $user -> password = bcrypt($request->password);

        $user -> save();

        $user_email = $user->email;
        $user_in = User::where('email', $user_email)->lists('id');

        //dd($user_in);

        if ($user->id_rol == 1) {
           return redirect()->route('Admin.User.index');
        }else {
            return redirect()->route('Public.show', $user_in[0]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$aplications = Aplication::all();
        $aplications = Aplication::where('rquiered_information','True')->get();

        $aplications->each(function ($aplications)
        {  
            $tables = Table::where('id_app',$aplications->id)->get();            
            
            $tables->each(function ($tables)
            {
                $fieldTables = FieldTable::where('id_table',$tables->id)->get();
                
                $fieldTables->each(function ($fieldTables)
                {
                    $id_fiel_tables = $fieldTables->id;

                    $types_fields= TypeField::where('id',$fieldTables->id_type_field)->get();
                    $fieldTables-> types_fields = $types_fields;
                  
                    $options= Option::where('id_field_table',$id_fiel_tables)->lists('name', 'id');
                    $fieldTables-> options = $options; 

                    //dd($fieldTables->options);
                               
                }); 
            
            $tables-> fields_tables = $fieldTables->all();   
            });
        
        $aplications -> tablas = $tables; 
         });  

        return view('public.create')
                            ->with('aplications',$aplications)
                            ->with('id',$id);
    }



    public function storeAll(Request $request)
    {
         $datos = $request->all();
         $info = unserialize($datos["info"]);
         
        

         //$user = $datos["id_user"];
         
         foreach ($info as $key => $values) {
             
            $position = $values['position'];
            $value =    $datos[$position-1];


            if ($values['select'] == 1) {
                $option = $value;
            }else {
                $option = 0;
            }

            $values['value'] = $value;
            $values['id_option'] = $option;
            //$values['id_user']   = $user;
            
            $fieldEspecific  = new FieldUser($values);



             $fieldEspecific -> save(); 

         }
         
         return redirect()->route('Public.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function searchOa()
    {
        
        return view('public.searchOa');
        
    }

    public function objectives()
    {

        return view('public.objectives');

    }

    public function advisers()
    {

        return view('public.advisers');

    }

    public function reporting()
    {

        return view('public.reporting');

    }

    public function publications()
    {

        return view('public.publications');

    }
}
