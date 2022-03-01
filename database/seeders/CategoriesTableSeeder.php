<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name_en' => 'un-categorized', 'name' => 'غير مصنفة', 'status' => 1]);
        Category::create(['name_en' => 'Natural', 'name' => 'طبيعة', 'status' => 1]);
        Category::create(['name_en' => 'Flowers', 'name' => 'أزهار', 'status' => 1]);
        Category::create(['name_en' => 'Kitchen', 'name' => 'مطابخ', 'status' => 0]);
    }
}
