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
                'name' => 'JefBezos',
                'email'=>'epfc@epfc.com',
                'password'=>'epfcepfc',
                'country'=>'Belgique',
                'phone'=>'047236790',
                'avatar'=>'http://localhost:8000/images/avatar/a17.jpg',
                'notification' => 0,
                'level' => 3,
                'about' => "Je suis Grégory, étudiant à l'EPFC en développement web. Je réalise ce site dans le cadre de mon travail de fin de formation via le Framework Laravel. Je suis Bruxellois en dehors de ma passion pour le web, je peins à l'aquarelle, je dessine et apprécie la bonne cuisine... :)",
            ],
            [
                'role_id'=>'1',
                'firstname'=>'Bob',
                'lastname'=>'Morane',
                'name' => 'Bobby',
                'email'=>'bobo@epfc.com',
                'password'=>'epfcepfc',
                'country'=>'Belgique',
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
                'name' => 'Simba',
                'email'=>'bob@sull.com',
                'password'=>'epfcepfc',
                'country'=>'Belgique',
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
                'name' => 'SuperMaker',
                'email'=>'julie@epfc.com',
                'password'=>'epfcepfc',
                'country'=>'Belgique',
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
                'name' => 'Xiiiing',
                'email'=>'xin@epfc.com',
                'password'=>'epfcepfc',
                'country'=>'Luxembourg',
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
                'name' => 'JV235',
                'email'=>'jules@vernes.com',
                'password'=>'epfcepfc',
                'country'=>'Belgique',
                'phone'=>'049678989',
                'avatar'=>'http://localhost:8000/images/avatar/a5.jpg',
                'notification' => 0,
                'level' => 1,
                'about' => "Bienvenue sur mon profil, je suis Jules et je suis un artiste expérimenté dans le dessin et la peinture. Depuis quelques années je réalise des logos à la demande.",
            ],
            [
                'role_id'=>'1',
                'firstname'=>'Henri',
                'lastname'=>'Bambel',
                'name' => 'Ad256',
                'email'=>'henrybambel22@gmail.com',
                'password'=>'epfcepfc',
                'country'=>'Belgique',
                'phone'=>'049689897',
                'avatar'=>'http://localhost:8000/images/avatar/a6.jpg',
                'notification' => 0,
                'level' => 1,
                'about' => "Je suis Albert, grand fan de dessin animée je dessine aujourd\hui divers personnages sur tous supports.",
            ],
            [
                'role_id'=>'1',
                'firstname'=>'Sammy',
                'lastname'=>'Rite',
                'name' => 'Nick56',
                'email'=>'nicky69@epfc.com',
                'password'=>'epfcepfc',
                'country'=>'Belgique',
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
                'name' => 'JCVD2',
                'email'=>'john@doe.com',
                'password'=>'epfcepfc',
                'country'=>'France',
                'phone'=>'047276998',
                'avatar'=>'http://localhost:8000/images/avatar/a9.jpg',
                'notification' => 0,
                'level' => 1,
                'about' => "John Doe est un indépendant spécialisé dans le domaine de la photo. Il réalisa aussi des vidéos sur demande dans divers domaines."
            ],
            [
                'role_id'=>'1',
                'firstname'=>'Ellie',
                'lastname'=>'Copter',
                'name' => 'tournicoti',
                'email'=>'ana@hotmail.fr',
                'password'=>'epfcepfc',
                'country'=>'Belgique',
                'phone'=>'049673421',
                'avatar'=>'http://localhost:8000/images/avatar/a10.jpg',
                'notification' => 0,
                'level' => 1,
                'about' => "Je suis Annabelle, réalisatrice de court-métrages. Le film est ma passion mais je gère également une société de publicité. Contactez moi pour plus d'infos"
            ],
            [
                'role_id'=>'1',
                'firstname'=>'Julienne',
                'lastname'=>'Delegum',
                'name' => 'Mamarion',
                'email'=>'juliennedelegum23@hotmail.fr',
                'password'=>'epfcepfc',
                'country'=>'Belgique',
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
                'name' => 'SuperWoman',
                'email'=>'robertalucie@hotmail.fr',
                'password'=>'epfcepfc',
                'country'=>'Belgique',
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
                'name' => 'Yayas',
                'email'=>'yaya@gmail.fr',
                'password'=>'epfcepfc',
                'country'=>'Belgique',
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
                'name' => 'ChriGoo',
                'email'=>'chris9@hotmail.fr',
                'password'=>'epfcepfc',
                'country'=>'Belgique',
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
                'name' => 'Momooo',
                'email'=>'momo@hotmail.com',
                'password'=>'epfcepfc',
                'country'=>'Belgique',
                'phone'=>'0496998877',
                'avatar'=>'http://localhost:8000/images/avatar/a12.jpg',
                'notification' => 0,
                'level' => 1,
                'about' => "Je suis Mohamed, consultant en informatique. Contactez moi pour plus d'infos"
            ],
            [
                'role_id'=>'1',
                'firstname'=>'Romelu',
                'lastname'=>'Lukaku',
                'name' => 'Georgio',
                'email'=>'georgelukaku@hotmail.fr',
                'password'=>'epfcepfc',
                'country'=>'Belgique',
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
                'password'=> Hash::make($data['password']),
                'country'=> $data['country'],
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
