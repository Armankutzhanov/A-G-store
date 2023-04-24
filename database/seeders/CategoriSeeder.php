<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name'=>'Женские одежды',
            'level'=>1
        ]);
        DB::table('categories')->insert([
            'name'=>'верхняя одежда',
            'parent_id'=>1,
            'level'=>1
        ]);
        DB::table('categories')->insert([
            'name'=>'брюки',
            'parent_id'=>1,
            'level'=>2
        ]);
        DB::table('categories')->insert([
            'name'=>'куртки',
            'parent_id'=>1,
            'level'=>3
        ]);

    }
}
