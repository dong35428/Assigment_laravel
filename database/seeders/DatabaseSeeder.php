<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // Tag::destroy('tags');

        $datas = [
            'Chính trị',
            'Kinh tế',
            'Công nghệ',
            'Sức khỏe',
            'Thể thao',
            'Giải trí',
            'Tin thế giới',
            'Tin địa phương',
            'Kinh doanh',
            'Khoa học',
            'Giáo dục',
            'Môi trường',
            'Văn hóa',
            'Phong cách sống',
            'Du lịch',
            'Ý kiến',
            'Tội phạm',
            'Thời tiết',
            'Tin nóng',
            'Vấn đề xã hội'
        ];
        foreach($datas as $data){
            Tag::create(['name' => $data]);
        }
    }
}
