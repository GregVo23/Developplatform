<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SubCategory;
use Illuminate\Support\Facades\DB;

class SubCategorySeeder extends Seeder
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
        SubCategory::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        
        //Define data
        $subCategories = [
            ['name'=>'réalisation de flyer',
             'image'=>'http://localhost:8000/images/subcategories/s1.jpg',
             'category_id' => 1,
             'description'=> 'Toutes réalisations visuelles telle que l\'impression, le web, création de logo, flyers, carte de visite ...',
            ],  
            ['name'=>'carte de visite',
             'image'=>'http://localhost:8000/images/subcategories/s1.jpg',
             'category_id' => 1,
             'description'=> 'Toutes réalisations visuelles telle que l\'impression, le web, création de logo, flyers, carte de visite ...',
            ],  
            ['name'=>'création de logo',
             'image'=>'http://localhost:8000/images/subcategories/s1.jpg',
             'category_id' => 1,
             'description'=> 'Toutes réalisations visuelles telle que l\'impression, le web, création de logo, flyers, carte de visite ...',
            ],  
            ['name'=>'bannière web',
             'image'=>'http://localhost:8000/images/subcategories/s1.jpg',
             'category_id' => 1,
             'description'=> 'Toutes réalisations visuelles telle que l\'impression, le web, création de logo, flyers, carte de visite ...',
            ],  
            ['name'=>'template site web',
             'image'=>'http://localhost:8000/images/subcategories/s1.jpg',
             'category_id' => 1,
             'description'=> 'Toutes réalisations visuelles telle que l\'impression, le web, création de logo, flyers, carte de visite ...',
            ],  
            ['name'=>'peinture et dessin',
             'image'=>'http://localhost:8000/images/subcategories/s1.jpg',
             'category_id' => 1,
             'description'=> 'Toutes réalisations visuelles telle que l\'impression, le web, création de logo, flyers, carte de visite ...',
            ],  
            ['name'=>'vidéo',
             'image'=>'http://localhost:8000/images/subcategories/s1.jpg',
             'category_id' => 1,
             'description'=> 'Toutes réalisations visuelles telle que l\'impression, le web, création de logo, flyers, carte de visite ...',
            ],  
            ['name'=>'application web',
             'image'=>'http://localhost:8000/images/subcategories/s1.jpg',
             'category_id' => 2,
             'description'=> 'Toutes application web telle qu\'il en existe ...',
            ],  
            ['name'=>'application mobile',
             'image'=>'http://localhost:8000/images/subcategories/s1.jpg',
             'category_id' => 2,
             'description'=> 'Toutes réalisations visuelles telle que l\'impression, le web, création de logo, flyers, carte de visite ...',
            ],  
            ['name'=>'Site web',
             'image'=>'http://localhost:8000/images/subcategories/s1.jpg',
             'category_id' => 2,
             'description'=> 'Les réalisations visuelles telle que Site web, le web, création de logo, flyers, carte de visite ...',
            ],  
            ['name'=>'correction de code',
             'image'=>'http://localhost:8000/images/subcategories/s1.jpg',
             'category_id' => 2,
             'description'=> 'Toutes correction de code réalisations visuelles telle que l\'impression, le web, création de logo, flyers, carte de visite ...',
            ],  
            ['name'=>'référencement web',
             'image'=>'http://localhost:8000/images/subcategories/s1.jpg',
             'category_id' => 2,
             'description'=> 'Toutes réalisations référencement web visuelles telle que l\'impression, le web, création de logo, flyers, carte de visite ...',
            ], 
        ];
        //Insert data in the table
        foreach ($subCategories as $subCategory) {     
            DB::table('sub_categories')->insert([
                'name' => $subCategory['name'],
                'image' => $subCategory['image'],
                'description' => $subCategory['description'],
                'category_id' => $subCategory['category_id'],
            ]);
        }
    }
}
