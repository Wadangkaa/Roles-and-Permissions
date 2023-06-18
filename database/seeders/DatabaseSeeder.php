<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            PermissionSeeder::class
        ]);

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => 'admin',
            'role_id' => 1
        ]);
        User::factory()->create([
            'name' => "User",
            'email' => 'iamuser@example.com',
            'role_id' => 2
        ]);
        User::factory()->create([
            'name' => "manager",
            'email' => 'iamManager@example.com',
            'role_id' => 3
        ]);

        $role_and_permissions = [
            [1, [1, 2, 3, 4]],
            [2, [2]],
            [3, [1, 2, 3]]
        ];

        foreach ($role_and_permissions as $key => $role_and_permission) {
            foreach ($role_and_permission[1] as $key => $permission) {
                DB::table('role_permissions')->insert([
                    'role_id' => $role_and_permission[0],
                    'permission_id' => $permission
                ]);
            }
        }
        
    }
}
