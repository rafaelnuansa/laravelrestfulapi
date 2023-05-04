<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'      => 'ICT UNIDA',
            'email'     => 'admin@gmail.com',
            'role_id'     => 1,
            'password'  => Hash::make('password'),
        ]);

        // Faker data kategori 
        $faker = Faker::create('id_ID');
        $categories = [];
        for ($i = 1; $i <= 10; $i++) {
            $name = $faker->unique()->word();
            $slug = Str::slug($name);
            $image = $faker->imageUrl(640, 480, 'technology', true);
            $categories[] = [
                'name' => $name,
                'slug' => $slug,
                'image' => $image
            ];
        }
        DB::table('categories')->insert($categories);

        // generate 10 data sliders
        for ($i = 0; $i < 10; $i++) {
            DB::table('sliders')->insert([
                'title' => $faker->sentence,
                'description' => $faker->paragraph,
                'image' => $faker->imageUrl(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }


        for ($i = 0; $i < 30; $i++) {
            $title = $faker->sentence(6);
            $slug = Str::slug($title);

            while (\DB::table('posts')->where('slug', $slug)->exists()) {
                $title = $faker->sentence(6);
                $slug = Str::slug($title);
            }

            DB::table('posts')->insert([
                'title' => $title,
                'slug' => $slug,
                'category_id' => $faker->numberBetween(1, 10),
                'user_id' => $faker->numberBetween(1, 5),
                'content' => $faker->paragraphs(5, true),
                'image' => $faker->imageUrl(640, 480),
                'description' => $faker->paragraph,
                'meta_description' => $faker->sentence(10),
                'meta_keyword' => $faker->sentence(5),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
