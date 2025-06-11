<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Football Equipment',
                'description' => 'Football equipment and accessories',
                'slug' => 'football-equipment'
            ],
            [
                'name' => 'Basketball Gear',
                'description' => 'Basketball gear and equipment',
                'slug' => 'basketball-gear'
            ],
            [
                'name' => 'Running Gear',
                'description' => 'Running shoes and accessories',
                'slug' => 'running-gear'
            ],
            [
                'name' => 'Tennis Equipment',
                'description' => 'Tennis equipment and accessories',
                'slug' => 'tennis-equipment'
            ],
            [
                'name' => 'Fitness Equipment',
                'description' => 'Fitness equipment and accessories',
                'slug' => 'fitness-equipment'
            ],
            [
                'name' => 'Swimming Gear',
                'description' => 'Swimming equipment and accessories',
                'slug' => 'swimming-gear'
            ],
            [
                'name' => 'Yoga & Pilates',
                'description' => 'Yoga and pilates equipment',
                'slug' => 'yoga-pilates'
            ],
            [
                'name' => 'Cycling Gear',
                'description' => 'Cycling equipment and accessories',
                'slug' => 'cycling-gear'
            ],
            [
                'name' => 'Boxing & MMA',
                'description' => 'Boxing and MMA equipment',
                'slug' => 'boxing-mma'
            ],
            [
                'name' => 'Team Sports',
                'description' => 'Equipment for various team sports',
                'slug' => 'team-sports'
            ]
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
} 