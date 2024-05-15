<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Contracts\Permission;
use Spatie\Permission\Models\Permission as ModelsPermission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Dashboard'
            ],
            [
                'name' => 'Kategori View',
            ],
            [
                'name' => 'Kategori Create',
            ],
            [
                'name' => 'Kategori Edit',
            ],
            [
                'name' => 'Kategori Delete',
            ],
            [
                'name' => 'Tag View',
            ],
            [
                'name' => 'Tag Create',
            ],
            [
                'name' => 'Tag Edit',
            ],
            [
                'name' => 'Tag Delete',
            ],
            [
                'name' => 'Artikel View',
            ],
            [
                'name' => 'Artikel Create',
            ],
            [
                'name' => 'Artikel Edit',
            ],
            [
                'name' => 'Artikel Delete',
            ],
            [
                'name' => 'Artikel Detail',
            ],
            [
                'name' => 'User View',
            ],
            [
                'name' => 'User Create',
            ],
            [
                'name' => 'User Edit',
            ],
            [
                'name' => 'User Delete',
            ],
            [
                'name' => 'Sosial Media View',
            ],
            [
                'name' => 'Sosial Media Create',
            ],
            [
                'name' => 'Sosial Media Edit',
            ],
            [
                'name' => 'Sosial Media Delete',
            ],
            [
                'name' => 'Role View',
            ],
            [
                'name' => 'Role Create',
            ],
            [
                'name' => 'Role Edit',
            ],
            [
                'name' => 'Role Delete',
            ],
            [
                'name' => 'Role Permissio'
            ],
            [
                'name' => 'Permission View',
            ],
            [
                'name' => 'Permission Create',
            ],
            [
                'name' => 'Permission Edit',
            ],
            [
                'name' => 'Permission Delete',
            ],
            [
                'name' => 'Setting View',
            ],
            [
                'name' => 'Setting Edit',
            ],
            [
                'name' => 'Filemanager View',
            ],
            [
                'name' => 'Sitemap View Update'
            ],
            [
                'name' => 'Profile View',
            ],
            [
                'name' => 'Change Password View',
            ]
        ];

        foreach($data as $dt)
        {
            ModelsPermission::create($dt);
        }
    }
}
