<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['admin', 'System administrator'],
            ['user', 'Regular user'],
            ['manager', 'Managerial role']
        ];

        foreach ($roles as $role) {
            Role::create([
                'name' => $role[0],
                'description' => $role[1]
            ]);
        }
    }
}
