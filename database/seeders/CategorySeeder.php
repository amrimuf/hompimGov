<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Infrastruktur', 'slug' => 'infrastruktur', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Lingkungan', 'slug' => 'lingkungan', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Layanan Publik', 'slug' => 'layanan-publik', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Keamanan', 'slug' => 'keamanan', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Kesehatan', 'slug' => 'kesehatan', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Lain-lain', 'slug' => 'lain-lain', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert($category);
        }
    }
}
