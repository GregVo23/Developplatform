<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Empty the table first
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        User::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        //Define data
        $users = [
            [
                'role_id'=>'1',
                'firstname'=>'Gregory',
                'lastname'=>'Van Ossel',
                'street'=>'Avenue de l\'Astronomie',
                'number'=> 52,
                'email'=>'epfc@epfc.com',
                'password'=>'epfcepfc',
                'country'=>'Belgique',
                'city'=>'Bruxelles',
                'phone'=>'047236778',
                'avatar'=>'http://localhost:8000/images/avatar/a17.jpg',
                'notification' => 0,
                'level' => 3,
                'about' => "Je suis Grégory, étudiant à l'EPFC en développement web. Je réalise ce site dans le cadre de mon travail de fin de formation via le Framework Laravel. Je suis Bruxellois en dehors de ma passion pour le web, je peins à l'aquarelle, je dessine et apprécie la bonne cuisine... :)"
            ],
            [
                'role_id'=>'2',
                'firstname'=>'Bob',
                'lastname'=>'Morane',
                'street'=>'Avenue du ruisseau',
                'number'=> 22,
                'email'=>'admin@epfc.com',
                'password'=>'epfcepfc',
                'country'=>'Belgique',
                'city'=>'Bruxelles',
                'phone'=>'049676778',
                'avatar'=>'http://localhost:8000/images/avatar/a2.jpg',
                'notification' => 0,
                'level' => 1,
                'about' => "Je suis Bob Morane, et je travaille avec des designers pour des réalisations numérique diverses. N'hésitez pas à me contacter pour davantage d'informations."
            ],
        ];
        //Insert data in the table

        foreach ($users as $data) {
            DB::table('users')->insert([
                'email' => $data['email'],
                'role_id'=> $data['role_id'],
                'firstname'=> $data['firstname'],
                'lastname'=> $data['lastname'],
                'street'=> $data['street'],
                'number'=> $data['number'],
                'password'=> Hash::make($data['password']),
                'country'=> $data['country'],
                'city'=> $data['city'],
                'phone'=> $data['phone'],
                'avatar'=> $data['avatar'],
                'notification' => $data['notification'],
                'level' => $data['level'],
                'about' => $data['about'],
                'created_at' => now(),
            ]);
        }

        //$users = User::factory()->count(10)->create();
    }
}
