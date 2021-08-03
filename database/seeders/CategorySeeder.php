<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
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
        Category::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        //Define data
        $categories = [
            ['name'=>'Design',
             'image'=>'http://localhost:8000/images/categories/c1.jpg',
             'description'=> 'Toutes réalisations visuelles telle que l\'impression, le web, création de logo, flyers, carte de visite ...',
            ],
            ['name'=>'Développement',
             'image'=>'http://localhost:8000/images/categories/c2.jpeg',
             'description'=> 'Toutes réalisations liées aux codes et language de programmation telles que la réalisation d\'application, site web ...',
            ],

        ];
        //Insert data in the table
        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'name' => $category['name'],
                'image' => $category['image'],
                'description' => $category['description'],
            ]);
        }
    }
}
