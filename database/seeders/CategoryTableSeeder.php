<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoryData = [
            [
                'category_name' => 'Men',
                'category_slug' => 'men',
                'meta_title' => 'men',
                'meta_description' => 'this is men page',
                'description' => "Lorem ipsum dolor sit amet,
             consectetur adipisicing elit.
             Accusantium adipisci aliquid aut consequuntur
            debitis deserunt
            dolore, dolorum exercitationem fugiat hic ipsam itaque libero molestias
            necessitatibus nihil obcaecati possimus qui repellendus.",
                'is_menu' => 1,
                'is_footer' => 1,
                'status' => 1

            ],
            [
                'category_name' => 'Women',
                'category_slug' => 'women',
                'meta_title' => 'women',
                'meta_description' => 'this is women page',
                'description' => "Lorem ipsum dolor sit amet,
             consectetur adipisicing elit.
             Accusantium adipisci aliquid aut consequuntur
            debitis deserunt
            dolore, dolorum exercitationem fugiat hic ipsam itaque libero molestias
            necessitatibus nihil obcaecati possimus qui repellendus.",
                'is_menu' => 1,
                'is_footer' => 1,
                'status' => 1

            ],
            [
                'category_name' => 'kids',
                'category_slug' => 'kids',
                'meta_title' => 'kids',
                'meta_description' => 'this is kids page',
                'description' => "Lorem ipsum dolor sit amet,
             consectetur adipisicing elit.
             Accusantium adipisci aliquid aut consequuntur
            debitis deserunt
            dolore, dolorum exercitationem fugiat hic ipsam itaque libero molestias
            necessitatibus nihil obcaecati possimus qui repellendus.",
                'is_menu' => 1,
                'is_footer' => 1,
                'status' => 1

            ],
            [
                'category_name' => 'sports',
                'category_slug' => 'sports',
                'meta_title' => 'sports',
                'meta_description' => 'this is sports page',
                'description' => "Lorem ipsum dolor sit amet,
             consectetur adipisicing elit.
             Accusantium adipisci aliquid aut consequuntur
            debitis deserunt
            dolore, dolorum exercitationem fugiat hic ipsam itaque libero molestias
            necessitatibus nihil obcaecati possimus qui repellendus.",
                'is_menu' => 1,
                'is_footer' => 1,
                'status' => 1

            ]

        ];

        foreach ($categoryData as $category) {
            Category::create($category);
        }
    }
}
