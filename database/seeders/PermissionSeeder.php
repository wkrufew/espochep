<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name' => 'Ver Admin'
        ]);
        Permission::create([
            'name' => 'Ver Moderador'
        ]);
        Permission::create([
            'name' => 'Ver Setting'
        ]);
        Permission::create([
            'name' => 'Listar Procesos'
        ]);
        Permission::create([
            'name' => 'Crear Procesos',
        ]);
        Permission::create([
            'name' => 'Eliminar Procesos'
        ]);
        Permission::create([
            'name' => 'Actualizar Procesos'
        ]);
        Permission::create([
            'name' => 'Listar Noticias',
        ]);
        Permission::create([
            'name' => 'Crear Noticias',
        ]);
        Permission::create([
            'name' => 'Actualizar Noticias',
        ]);
        Permission::create([
            'name' => 'Eliminar Noticias',
        ]);
        Permission::create([
            'name' => 'Listar Proyectos',
        ]);
        Permission::create([
            'name' => 'Crear Proyectos',
        ]);
        Permission::create([
            'name' => 'Actualizar Proyectos',
        ]);
        Permission::create([
            'name' => 'Eliminar Proyectos',
        ]);
        Permission::create([
            'name' => 'Crear Rol'
        ]);
        Permission::create([
            'name' => 'Listar Roles'
        ]);
        Permission::create([
            'name' => 'Editar Rol'
        ]);
        Permission::create([
            'name' => 'Eliminar Rol'
        ]);
        Permission::create([
            'name' => 'Ver Usuarios'
        ]);
        Permission::create([
            'name' => 'Ver Aprobacion',
        ]);
        Permission::create([
            'name' => 'Ver Transparencia',
        ]);
        Permission::create([
            'name' => 'Ver Rendicion',
        ]);
    }
}
