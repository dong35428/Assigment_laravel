<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [

            ['name' => 'Sức khỏe'],
            ['name' => 'Ẩm thực'],
            ['name' => 'Du lịch'],
            ['name' => 'Giáo dục'],
            ['name' => 'Kinh doanh'],
            ['name' => 'Thể Thao'],
            ['name' => 'Thời trang'],
            ['name' => 'Xã hội'],

        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
