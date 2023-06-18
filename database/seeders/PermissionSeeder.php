<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            ['create', 'Create new records'],
            ['read', 'Read existing records'],
            ['update', 'Update existing records'],
            ['delete', 'Delete existing records']
        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission[0],
                'description' => $permission[1]
            ]);
        }
    }
}
