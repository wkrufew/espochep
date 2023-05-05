<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create([
            'name' => 'Administrador'
        ]);

        $role->permissions()->attach([1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,23]);

        $role = Role::create([
            'name' => 'Moderador'
        ]);

        $role->syncPermissions([
            'Ver Moderador',
            'Listar Procesos',
            'Crear Procesos',
            'Eliminar Procesos',
            'Actualizar Procesos',
            'Listar Noticias',
            'Crear Noticias',
            'Actualizar Noticias',
            'Eliminar Noticias',
            'Listar Proyectos',
            'Crear Proyectos',
            'Actualizar Proyectos',
            'Eliminar Proyectos',
            'Ver Transparencia',
            'Ver Rendicion'
        ]);

        $role = Role::create([
            'name' => 'Gerencia'
        ]);
    }
    
}
