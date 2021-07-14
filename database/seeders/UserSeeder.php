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
                'role_id'=>'2',
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
                'about' => "Je suis Grégory, étudiant à l'EPFC en développement web. Je réalise ce site dans le cadre de mon travail de fin de formation via le Framework Laravel. Je suis Bruxellois en dehors de ma passion pour le web, je peins à l'aquarelle, je dessine et apprécie la bonne cuisine... :)",
            ],
            [
                'role_id'=>'1',
                'firstname'=>'Bob',
                'lastname'=>'Morane',
                'street'=>'Avenue du ruisseau',
                'number'=> 22,
                'email'=>'bobo@epfc.com',
                'password'=>'epfcepfc',
                'country'=>'Belgique',
                'city'=>'Bruxelles',
                'phone'=>'049676778',
                'avatar'=>'http://localhost:8000/images/avatar/a2.jpg',
                'notification' => 0,
                'level' => 1,
                'about' => "Je suis Bob Morane, et je travaille avec des designers pour des réalisations numérique diverses. N'hésitez pas à me contacter pour davantage d'informations.",
            ],
            [
                'role_id'=>'1',
                'firstname'=>'Bob',
                'lastname'=>'Sull',
                'street'=>'Rue du chateau',
                'number'=> 112,
                'email'=>'bob@sull.com',
                'password'=>'epfcepfc',
                'country'=>'Belgique',
                'city'=>'Liege',
                'phone'=>'0473253678',
                'avatar'=>'http://localhost:8000/images/avatar/a3.jpg',
                'notification' => 1,
                'level' => 1,
                'about' => "Bob Sull ? Vous ne me connaissez pas encore ? Je suis un administrateur de site web et je suis impliqué dans de nombreux développement.",
            ],
            [
                'role_id'=>'1',
                'firstname'=>'Julie',
                'lastname'=>'Van dermeulen',
                'street'=>'Rue du moulin',
                'number'=> 7,
                'email'=>'julie@epfc.com',
                'password'=>'epfcepfc',
                'country'=>'Belgique',
                'city'=>'Bruxelles',
                'phone'=>'0478345290',
                'avatar'=>'http://localhost:8000/images/avatar/a1.jpg',
                'notification' => 0,
                'level' => 1,
                'about' => "Je travaille pour une société orienté vers le design web, je suis également freelance sur mes à côtés et je suis à votre disposition au besoin.",
            ],
            [
                'role_id'=>'1',
                'firstname'=>'Xin',
                'lastname'=>'Beijiong',
                'street'=>'Av du Port',
                'number'=> 319,
                'email'=>'xin@epfc.com',
                'password'=>'epfcepfc',
                'country'=>'Luxembourg',
                'city'=>'Luxembourg',
                'phone'=>'049656238',
                'avatar'=>'http://localhost:8000/images/avatar/a4.jpg',
                'notification' => 0,
                'level' => 1,
                'about' => "Je suis Xin et je réalise le design de pages web depuis déjà quelques années. Je recherche des projets afin de m'entrainer et de développer mon expérience.",
            ],
            [
                'role_id'=>'1',
                'firstname'=>'Jules',
                'lastname'=>'Verne',
                'street'=>'Avenue de l\'hélicopère',
                'number'=> 1,
                'email'=>'jules@vernes.com',
                'password'=>'epfcepfc',
                'country'=>'Belgique',
                'city'=>'Namur',
                'phone'=>'049678989',
                'avatar'=>'http://localhost:8000/images/avatar/a5.jpg',
                'notification' => 0,
                'level' => 1,
                'about' => "Bienvenue sur mon profil, je suis Jules et je suis un artiste expérimenté dans le dessin et la peinture. Depuis quelques années je réalise des logos à la demande.",
            ],
            [
                'role_id'=>'1',
                'firstname'=>'Albert',
                'lastname'=>'Deprez',
                'street'=>'Avenue Capricorne',
                'number'=> 94,
                'email'=>'albert22@gmail.com',
                'password'=>'epfcepfc',
                'country'=>'Belgique',
                'city'=>'Wavre',
                'phone'=>'049689897',
                'avatar'=>'http://localhost:8000/images/avatar/a6.jpg',
                'notification' => 0,
                'level' => 1,
                'about' => "Je suis Albert, grand fan de dessin animée je dessine aujourd\hui divers personnages sur tous supports.",
            ],
            [
                'role_id'=>'1',
                'firstname'=>'Nicky',
                'lastname'=>'Larsson',
                'street'=>'Avenue du commissaire',
                'number'=> 22,
                'email'=>'nicky69@epfc.com',
                'password'=>'epfcepfc',
                'country'=>'Belgique',
                'city'=>'Peutie',
                'phone'=>'049671234',
                'avatar'=>'http://localhost:8000/images/avatar/a7.jpg',
                'notification' => 0,
                'level' => 1,
                'about' => "Aucun danger ne l'impressionne, les coups durs il les affectionne. Et la justice le passionne, Nicky Larson ne craint personne."
            ],
            [
                'role_id'=>'1',
                'firstname'=>'John',
                'lastname'=>'Doe',
                'street'=>'Avenue Apache',
                'number'=> 78,
                'email'=>'john@doe.com',
                'password'=>'epfcepfc',
                'country'=>'France',
                'city'=>'Lille',
                'phone'=>'047276998',
                'avatar'=>'http://localhost:8000/images/avatar/a9.jpg',
                'notification' => 0,
                'level' => 1,
                'about' => "John Doe est un indépendant spécialisé dans le domaine de la photo. Il réalisa aussi des vidéos sur demande dans divers domaines."
            ],
            [
                'role_id'=>'1',
                'firstname'=>'Annabelle',
                'lastname'=>'Trossart',
                'street'=>'Avenue de la brise',
                'number'=> 2,
                'email'=>'ana@hotmail.fr',
                'password'=>'epfcepfc',
                'country'=>'Belgique',
                'city'=>'Bruxelles',
                'phone'=>'049673421',
                'avatar'=>'http://localhost:8000/images/avatar/a10.jpg',
                'notification' => 0,
                'level' => 1,
                'about' => "Je suis Annabelle, réalisatrice de court-métrages. Le film est ma passion mais je gère également une société de publicité. Contactez moi pour plus d'infos"
            ],
            [
                'role_id'=>'1',
                'firstname'=>'Marion',
                'lastname'=>'Corbillon',
                'street'=>'Avenue de la fresque murale',
                'number'=> 32,
                'email'=>'marion23@hotmail.fr',
                'password'=>'epfcepfc',
                'country'=>'Belgique',
                'city'=>'Namur',
                'phone'=>'047873421',
                'avatar'=>'http://localhost:8000/images/avatar/a16.jpg',
                'notification' => 0,
                'level' => 1,
                'about' => "Je suis Marion, directrice d'un cabinet médical. Les animaux sont ma passion mais je gère également une société de publicité. Contactez moi pour plus d'infos"
            ],
            [
                'role_id'=>'1',
                'firstname'=>'Lucie',
                'lastname'=>'Roberta',
                'street'=>'Rue de l\'aventure',
                'number'=> 9,
                'email'=>'robertalucie@hotmail.fr',
                'password'=>'epfcepfc',
                'country'=>'Belgique',
                'city'=>'Anvers',
                'phone'=>'049873021',
                'avatar'=>'http://localhost:8000/images/avatar/a15.jpg',
                'notification' => 0,
                'level' => 1,
                'about' => "Je suis développeuse front-end d'application mobile. Contactez moi pour plus d'infos"
            ],
            [
                'role_id'=>'1',
                'firstname'=>'Yasmine',
                'lastname'=>'Bellaissia',
                'street'=>'Avenue de la reine',
                'number'=> 91,
                'email'=>'yaya@gmail.fr',
                'password'=>'epfcepfc',
                'country'=>'Belgique',
                'city'=>'Genk',
                'phone'=>'049123421',
                'avatar'=>'http://localhost:8000/images/avatar/a14.jpg',
                'notification' => 0,
                'level' => 1,
                'about' => "Je suis Yasmine, j'habite le Limbourg et je travaille dans le domaine de la publicité. Je mets mon expérience à votre disposition."
            ],
            [
                'role_id'=>'1',
                'firstname'=>'Christian',
                'lastname'=>'Godearts',
                'street'=>'Rue du chaine',
                'number'=> 64,
                'email'=>'chris9@hotmail.fr',
                'password'=>'epfcepfc',
                'country'=>'Belgique',
                'city'=>'Ostende',
                'phone'=>'0496343421',
                'avatar'=>'http://localhost:8000/images/avatar/a11.jpg',
                'notification' => 0,
                'level' => 1,
                'about' => "Je suis Christian, réalisateur de court-métrages. Le film est ma passion mais je gère également une société de publicité. Contactez moi pour plus d'infos"
            ],
            [
                'role_id'=>'1',
                'firstname'=>'Mohamed',
                'lastname'=>'Ben Albanne',
                'street'=>'Avenue de la Suisse',
                'number'=> 52,
                'email'=>'momo@hotmail.com',
                'password'=>'epfcepfc',
                'country'=>'Belgique',
                'city'=>'Bruxelles',
                'phone'=>'0496998877',
                'avatar'=>'http://localhost:8000/images/avatar/a12.jpg',
                'notification' => 0,
                'level' => 1,
                'about' => "Je suis Mohamed, consultant en informatique. Contactez moi pour plus d'infos"
            ],
            [
                'role_id'=>'1',
                'firstname'=>'George',
                'lastname'=>'Lukaku',
                'street'=>'Avenue d\' Anderlecht',
                'number'=> 10,
                'email'=>'georgelukaku@hotmail.fr',
                'password'=>'epfcepfc',
                'country'=>'Belgique',
                'city'=>'Bruxelles',
                'phone'=>'044673421',
                'avatar'=>'http://localhost:8000/images/avatar/a13.jpg',
                'notification' => 0,
                'level' => 1,
                'about' => "Georges, acteur de film. Le film est ma passion mais je gère également une société de production. Contactez moi pour plus d'infos"
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
