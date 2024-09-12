<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str; // Str facade'ını kullanmak için import


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories=['Siyasət', 'Kriminal', 'İqtisadiyyat', 'İdman', 'Gündəlik Həyat'];

        foreach($categories as $category)
        {
            DB::table('categories')->insert([
                'name'=>$category,
                'slug'=>str::slug($category),
                'created_at'=>now(),
                'updated_at'=>now()
            ]);
        }
    }
}
