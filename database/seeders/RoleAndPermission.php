<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermission extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdmin = Role::create([
            'name' => 'super-admin',
            'description' => 'pengguna akan memiliki semua hak akses super admin'
        ]);

        $admin = Role::create([
            'name' => 'admin',
            'description' => 'pengguna akan memiliki semua hak akses admin'
        ]);

        //crud about role
        $pengguna = Role::create([
            'name' => 'pengguna',
            'description' => 'pengguna akan memiliki hak akses biasa'
        ]);

        // crud about role
        $showrole = Permission::create([
            'name' => 'show-role',
            'description' => 'pengguna dapat menampilkan menu manajemen role'
        ]);
        $addrole = Permission::create([
            'name' => 'add-role',
            'description' => 'pengguna dapat menambahkan role baru'
        ]);
        $editrole = Permission::create([
            'name' => 'edit-role',
            'description' => 'pengguna dapat mengedit role  yang telah ada'
        ]);
        $deleterole = Permission::create([
            'name' => 'delete-role',
            'description' => 'pengguna dapat menghapus role yang telah ada'
        ]);

        //crud about permissions
        $showpermissions = Permission::create([
            'name' => 'show-permission',
            'description' => 'pengguna dapat menampilkan menu manajemen hak akses'
        ]);
        $addpermission = Permission::create([
            'name' => 'add-permission',
            'description' => 'pengguna dapat menambahkan hak akses baru'
        ]);
        $editpermission = Permission::create([
            'name' => 'edit-permission',
            'description' => 'pengguna dapat mengedit hak akses yang telah ada'
        ]);
        $deletepermission = Permission::create([
            'name' => 'delete-permission',
            'description' => 'pengguna dapat menghapus hak akses  yang telah ada'
        ]);

    }
}
