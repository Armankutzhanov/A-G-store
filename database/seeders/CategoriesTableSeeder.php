<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Женская одежда',
                'slug' => 'womens-clothing',
                'children' => [
                    [
                        'name' => 'Платья',
                        'slug' => 'dresses',
                        'children' => [
                            [
                                'name' => 'Вечерние платья',
                                'slug' => 'evening-dresses',
                            ],
                            [
                                'name' => 'Летние платья',
                                'slug' => 'summer-dresses',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Юбки',
                        'slug' => 'skirts',
                    ],
                    [
                        'name' => 'Блузки',
                        'slug' => 'blouses',
                    ],
                ],
            ],
            [
                'name' => 'Мужская одежда',
                'slug' => 'mens-clothing',
                'children' => [
                    [
                        'name' => 'Рубашки',
                        'slug' => 'shirts',
                    ],
                    [
                        'name' => 'Футболки',
                        'slug' => 't-shirts',
                    ],
                    [
                        'name' => 'Джинсы',
                        'slug' => 'jeans',
                    ],
                ],
            ],
        ];

        foreach ($categories as $categoryData) {
            $category = Category::create([
                'name' => $categoryData['name'],
                'slug' => $categoryData['slug'],
            ]);

            if (isset($categoryData['children'])) {
                foreach ($categoryData['children'] as $childData) {
                    $child = $category->children()->create([
                        'name' => $childData['name'],
                        'slug' => $childData['slug'],
                    ]);

                    if (isset($childData['children'])) {
                        foreach ($childData['children'] as $grandchildData) {
                            $grandchild = $child->children()->create([
                                'name' => $grandchildData['name'],
                                'slug' => $grandchildData['slug'],
                            ]);
                        }
                    }
                }
            }
        }
    }
}
