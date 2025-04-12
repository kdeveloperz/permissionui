<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $role = Role::create(['name' => 'admin']);
        DB::table('roles')->insert([
            ['name' => 'manager', 'guard_name' => 'web'],
            ['name' => 'editor', 'guard_name' => 'web'],
            ['name' => 'uploader', 'guard_name' => 'web'],
            ['name' => 'user', 'guard_name' => 'web'],
        ]);
        DB::table('permissions')->insert([
            ['name' => 'view dashboard', 'guard_name' => 'web'],
            ['name' => 'view role', 'guard_name' => 'web'],
            ['name' => 'view permission', 'guard_name' => 'web'],
            ['name' => 'create role', 'guard_name' => 'web'],
            ['name' => 'create permission', 'guard_name' => 'web'],
            ['name' => 'assign permission', 'guard_name' => 'web'],
        ]);
        $permissions = Permission::all()->pluck('name');
        
        $role->syncPermissions($permissions);
        User::factory()->create([
            'name' => 'Admin Test User',
            'email' => 'admin@admin.com',
        ])->assignRole('admin');

    }
}
