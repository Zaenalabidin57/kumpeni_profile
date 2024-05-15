<?php

namespace Database\Seeders;

use App\Models\Socmed;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SocmedTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Socmed::create([
            'name' => 'Facebook',
            'link' => 'https://facebook.com'
        ]);

        Socmed::create([
            'name' => 'Twitter',
            'link' => 'https://twitter.com'
        ]);

        Socmed::create([
            'name' => 'Instagram',
            'link' => 'https://instagram.com'
        ]);
    }
}
