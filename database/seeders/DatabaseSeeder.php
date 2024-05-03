<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table("categories")->insert([
            ['id' => 1, 'name' => 'Sushi', 'img_src' => 'sushi.jpg'],
            ['id' => 2, 'name' => 'Előétel', 'img_src' => 'eloetel.jpg'],
            ['id' => 3, 'name' => 'Leves', 'img_src' => 'leves.jpg'],
            ['id' => 4, 'name' => 'Főétel', 'img_src' => 'foetel.jpg'],
            ['id' => 5, 'name' => 'Desszertek', 'img_src' => 'desszert.jpg'],
        ]);

        DB::table("types")->insert([
            ['id' => 1, 'category_id' => 1, 'name' => 'Nigiri', 'img_src' => 'nigiri.jpg'],
            ['id' => 2, 'category_id' => 1, 'name' => 'Maki', 'img_src' => 'maki.jpg'],
            ['id' => 3, 'category_id' => 1, 'name' => 'Lazacos', 'img_src' => 'lazac.jpg'],
        ]);

        DB::table("products")->insert([
            ['id' => 1, 'type_id' => 1, 'name' => 'Nigiri egyes', 'img_src' => 'nigiri1.jpg', 'price' => 1500, 'ingredients' => 'nigir, egy'],
            ['id' => 2, 'type_id' => 1, 'name' => 'Nigiri kettes', 'img_src' => 'nigiri2.jpg', 'price' => 2000, 'ingredients' => 'nigir, ketto'],
            ['id' => 3, 'type_id' => 1, 'name' => 'Nigiri hármas', 'img_src' => 'nigiri3.jpg', 'price' => 2500, 'ingredients' => 'nigir, harom'],
        ]);
    }
}
