<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $categories = ['Desain', 'Edukasi', 'Keluarga & Anak', 'Kesehatan', 'Makanan & Minuman', 'Otomotif', 'Peliharaan', 'Permainan', 'Politik', 'Teknologi', 'Travel'];

        foreach($categories as $category)
        {
            DB::table('categories')->insert([
                'name'  =>  $category
            ]);
        }
    }
}
