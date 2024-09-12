<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker=Faker::create();
         for($i=0;$i<5;$i++)
            {
                $title=$faker->sentence(6); //morterzenin icindeki 6, 6 kelimelik bir cumle yazmaq ucundur
                DB::table('articles')->insert([
                    'category_id'=>rand(1,5), //category cedvelinde 5 dene kategori var,buradada random 5 den 1 i secmek ucun bele yazilib
                    'title'=>$title,
                    'image'=>$faker->imageUrl(800, 400, 'cats', true, 'Faker'),
                    'content'=>$faker->paragraph(6),
                    'slug'=>str::slug($title),
                    'created_at'=>$faker->dateTime(), // dateTime formatını doğru kullanma
                    'updated_at'=>now()
                ]);
            }
    }
}
