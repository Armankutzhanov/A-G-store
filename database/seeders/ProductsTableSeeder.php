<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        $categories = Category::where('parent_id', '!=', null)->get();

        foreach ($categories as $category) {
            $products = factory(Product::class, 10)->make();

            foreach ($products as $product) {
                $product->category_id = $category->id;
                $product->save();
            }
        }
    }
}
