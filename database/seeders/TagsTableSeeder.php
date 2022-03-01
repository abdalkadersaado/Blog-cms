<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create(['name_en' => 'Flowers', 'name' => 'الازهار']);
        Tag::create(['name_en' => 'Nature', 'name' => 'طبيعة']);
        Tag::create(['name_en' => 'Electronic', 'name' => 'الكتروني']);
        Tag::create(['name_en' => 'Life', 'name' => 'حياة']);
        Tag::create(['name_en' => 'Style', 'name' => 'نمط']);
        Tag::create(['name_en' => 'Food', 'name' => 'طعام']);
        Tag::create(['name_en' => 'Travel', 'name' => 'سفر']);
    }
}
