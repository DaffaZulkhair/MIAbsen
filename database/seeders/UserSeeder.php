<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'admin',
            'username' => 'mipolsri',
            'email' => 'mipolsri@gmail.com',
            'password' => Hash::make('sungaisahang13')
        ]);

        $role = Role::create(['name' => 'Admin']);

        $permissions = Permission::pluck('id', 'id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);

        /* Mahasiswa & Pimpinan */
        $roles = [
            [
                'name' => 'Mahasiswa',
            ],
            [
                'name' => 'Dosen',
            ],
            [
                'name' => 'Pimpinan'
            ]
        ];

        foreach ($roles as $item) {
            Role::create($item);
        }
    }
}
