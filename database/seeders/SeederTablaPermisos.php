<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//spatie

use Spatie\Permission\Models\Permission;

class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos = [

            //tabla roles
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',

            //tabla usuarios

            'ver-usuarios',
            'crear-usuarios',
            'editar-usuarios',
            'borrar-usuarios',

            // Tabla categories

            'ver-categorias',
            'crear-categorias',
            'editar-categorias',
            'borrar-categorias',

            // Tabla products

            'ver-productos',
            'crear-productos',
            'editar-productos',
            'borrar-productos',

            // Cabañas

            'ver-timbre',
            'ver-notificaciones',

        ];

        foreach ($permisos as $permiso) {
            Permission::create(['name' => $permiso]);
        }
    }
}
