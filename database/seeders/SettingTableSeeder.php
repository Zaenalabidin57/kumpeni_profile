<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'site_name' => 'Laravel Blog',
            'email' => 'laravelblog@gmail.com',
            'address' => 'Bandug',
            'phone' => '089123124',
            'meta_keyword' => 'Laravel blog',
            'meta_description' => 'Laravel blog adalah situs web informasi seputas teknolog yang anda bisa dapatkan deudah',
            'author' => 'Dev',
            'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsa, voluptatem! Molestias adipisci cum, excepturi officia quidem similique id impedit culpa animi debitis? Magnam aliquam a facere repellendus nisi corrupti amet tempora molestiae dolorum odit nam, nobis voluptatem impedit consequuntur dolorem dolore. Quis impedit eligendi quas quod vel consequuntur placeat doloremque rem itaque necessitatibus modi, suscipit iusto id quos velit autem nam, blanditiis quo quia quae error totam voluptatibus! Quibusdam rerum sunt pariatur maxime exercitationem! Reiciendis repellat, rem quidem at tenetur harum atque quaerat sequi ratione neque nulla iste ipsa modi libero accusantium? Sed cumque error tenetur officiis magni quis suscipit.'
        ]);
    }
}
