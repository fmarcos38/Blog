<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//importo Este Modelo, q se instaló con larave-permission y ME lo cipio desde la pag --> https://spatie.be/docs/laravel-permission/v5/basic-usage/basic-usage
use Spatie\Permission\Models\Role;
//importo desde la pag --> https://spatie.be/docs/laravel-permission/v5/basic-usage/basic-usage
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //creo rol admin
        $role1 = Role::create(['name' => 'Admin']);

        //creo rol blogger
        $role2 = Role::create((['name' => 'Blogger']));

        //creo permiso para la ruta home
        // Con esto ->syncRole($role1) -->Le asigno una ves creado el Permiso, A LA TABLA intermedia(
        //por ser una relacion de muchos a muchos ENTRE roles y permissions) el ID del rol
        //el  METODO syncRoles([]) --> es para asig el permiso a varios ROLES. NO PARA un rol SOLO.
        //PARA 1 SOLO es assignRol();
        Permission::create((['name' => 'admin.home']))->syncRoles([$role1, $role2]);

        //creo permiso par las rutas categories
        Permission::create((['name' => 'admin.categories.index']))->syncRoles([$role1, $role2]);
        Permission::create((['name' => 'admin.categories.create']))->syncRoles([$role1, $role2]);
        Permission::create((['name' => 'admin.categories.edit']))->syncRoles([$role1, $role2]);
        Permission::create((['name' => 'admin.categories.destroy']))->syncRoles([$role1, $role2]); 

        //creo permiso par las rutas etiquetas
        Permission::create((['name' => 'admin.tags.index']))->syncRoles([$role1, $role2]);
        Permission::create((['name' => 'admin.tags.create']))->syncRoles([$role1, $role2]);
        Permission::create((['name' => 'admin.tags.edit']))->syncRoles([$role1, $role2]);
        Permission::create((['name' => 'admin.tags.destroy']))->syncRoles([$role1, $role2]); 

        //creo permiso par las rutas posts
        Permission::create((['name' => 'admin.posts.index']))->syncRoles([$role1, $role2]);
        Permission::create((['name' => 'admin.posts.create']))->syncRoles([$role1, $role2]);
        Permission::create((['name' => 'admin.posts.edit']))->syncRoles([$role1, $role2]);
        Permission::create((['name' => 'admin.posts.destroy']))->syncRoles([$role1, $role2]);

    }
}
