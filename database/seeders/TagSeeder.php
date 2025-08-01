<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        $tags = [
            ['name' => 'Post'],
            ['name' => 'Portfolio'],
            ['name' => 'Development'],
            ['name' => 'IT'],
            ['name' => 'Profile'],
            ['name' => 'PHP'],
            ['name' => 'Framework'],
        ];

        foreach ($tags as $tag) {
            DB::table('tags')->updateOrInsert(
                ['name' => $tag['name']],
                $tag
            );
        }
    }
}
