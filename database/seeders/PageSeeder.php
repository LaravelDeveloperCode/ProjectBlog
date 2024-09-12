<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str; // Str facade'ını kullanmak için import

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pages=['Haqqımızda', 'Karyera', 'Vizyonumuz', 'Misyamız'];
        $count=0;
        
        foreach($pages as $page)
        {
            $count++;
            DB::table('pages')->insert([
                'title'=>$page,
                'image'=>'https://imageio.forbes.com/specials-images/imageserve/633a774a842d06ecd68286ff/The-5-Biggest-Business-Trends-For-2023/960x0.jpg?format=jpg&width=1440',
                'content'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Minima rerum soluta, placeat obcaecati totam perspiciatis nostrum qui repellat ',
                'slug'=>str::slug($page),
                'order'=>$count,
                'created_at'=>now(),
                'updated_at'=>now()
            ]);
        }
    }
}
