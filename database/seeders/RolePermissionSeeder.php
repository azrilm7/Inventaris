<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Permission::updateOrCreate(['name' => 'test']);
        Role::updateOrCreate(['name'=>'Administrator']);
        Role::updateOrCreate(['name'=>'Operator']);
        Role::updateOrCreate(['name'=>'Petugas']);
    }
}
