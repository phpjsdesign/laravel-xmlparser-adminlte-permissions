<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
            ['name'  => 'Admin','email' => 'admin@admin.com','password' =>bcrypt('password')],
            ['name'  => 'Loader','email' => 'loader@loader.com','password' =>bcrypt('password')],
            ['name'  => 'Viewer','email' => 'viewer@viewer.com','password' =>bcrypt('password')],
        ];
        Admin::insert($admin);

        Role::insert([
            ['name'=>'Admin','slug'=>'admin'],
            ['name'=>'Data Loader','slug'=>'data-loader'],
            ['name'=>'Data Viewer','slug'=>'data-viewer'],
        ]);

        Permission::insert([
            ['name'=>'Table View','slug'=>'table-view'],
            ['name'=>'Data View','slug'=>'data-load'],
            ['name'=>'Data View','slug'=>'data-view'],
        ]);

        // Assign AdminRole
        Admin::whereId(1)->first()->roles()->attach([1]);
        Admin::whereId(2)->first()->roles()->attach([2]);
        Admin::whereId(3)->first()->roles()->attach([3]);

        // AdminRole has AdminPermission
        Role::whereId(1)->first()->permissions()->attach([1,2,3]);
        Role::whereId(2)->first()->permissions()->attach([1,2,3]);
        Role::whereId(3)->first()->permissions()->attach([1,3]);

    }
}
