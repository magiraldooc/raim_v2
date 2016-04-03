<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        		'id_rol'	=>	1,
        		'user_name'	=>	'MayorDan',
        		'name'		=>	'Daniel Andres',
        		'last_name'	=>	'Espinosa Gomez',
        		'email'		=>	'daespinosag@unal.edu.co',
                'institution'     =>  'Unal',
                'birth_date'     =>  '16/09/1993',
                'language'     =>  'Español',

        		'password'	=>	bcrypt('secret')
        	]);
    }
}
