<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ConfingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('confings')->insert([
            'title'=>'Codeigniter Hocası',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
    }
}
