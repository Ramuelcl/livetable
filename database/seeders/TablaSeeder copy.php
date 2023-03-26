<?php

namespace Database\Seeders;

use App\Models\backend\Tabla;
use Illuminate\Database\Seeder;

class TablaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // crea configuracion: menus
        // $Menu = ['id', 'Nombre', 'subMenu' => []]","
        $tabla['Menu'] = array(
            'Menus',
            'Uno',
            'Dos',
            'Tres' => ['Categorias', 'Marcadores'],
            'Cuatro',
            'Cinco' => ['A', 'B', 'C', 'D', 'E'],
            'Seis',
            'Siete'
        );

        $m = 0;
        foreach ($tabla['Menu'] as $i => $menu1) {
            // dump(['i'=>$i, 'menu'=>$menu1])","
            if ($i == 0) {
                Tabla::factory(1)->create(
                    [
                        'tabla' => 1000,
                        'tabla_id' => $i,
                        'nombre' => $menu1,
                        'descripcion' => null,
                        'activo' => false,
                    ]
                );
            } else {
                $m = $m + 100;
                Tabla::factory(1)->create(
                    [
                        'tabla' => 1000,
                        'tabla_id' => $m,
                        'nombre' => \is_array($menu1) ? $i : $menu1,
                        'valor1' => 0,
                    ]
                );
                if (\is_array($menu1)) {
                    foreach ($menu1 as $j => $menu2) {
                        $n = $m + $j + 1;
                        Tabla::factory(1)->create(
                            [
                                'tabla' => 1000,
                                'tabla_id' => $n,
                                'nombre' => $menu2,
                                'valor1' => $m,
                            ]
                        );
                    }
                }
            }
        }

        // crea profesiones
        $tabla['Profesiones'] = array('Profesiones', 'Doctor', 'Empresario', 'Dibujante', 'Arquitecto', 'Analista', 'Programador', 'Enfermera', 'Contador', 'Profesor', 'Sin Profesion');
        foreach ($tabla['Profesiones'] as $key => $value) {
            if ($key == 0) {
                Tabla::factory(1)->create(
                    [
                        'tabla' => 15000,
                        'tabla_id' => $key,
                        'nombre' => $value,
                        'descripcion' => null,
                        'activo' => false,
                    ]
                );
            } else {
                Tabla::factory(1)->create(
                    [
                        'tabla' => 15000,
                        'tabla_id' => $key,
                        'nombre' => $value,
                    ]
                );
            }
        }

        /** crea movimientos de banco */
        $tabla['movimientos'] = array(
            ["15100", "0", "Banca", "movimientos -concentrados", "0", "0",],
            ["15100", "1", "REIGN", "pagos de clientes", "1", "1.00",],
            ["15100", "2", "DIOURON", "pagos de clientes", "1", "2.00",],
            ["15100", "9", "PUVIS", "pagos de clientes", "1", "9.00",],
            ["15100", "22", "AC2 PRODUCTION", "pagos de clientes", "1", "22.00",],
            ["15100", "69", "CRUCELISA ARISTIZABAL", "movimientos personales", "1", "69.00",],
            ["15100", "70", "REGINA", "movimientos personales", "1", "70.00",],
            ["15100", "1500", "Navigo", "proveedores", "1", "1500.00",],
            ["15100", "1501", "SFR", "proveedores", "0", "1501.00",],
            ["15100", "1502", "Google YouTube", "proveedores", "1", "1502.00",],
            ["15100", "1503", "Orange", "proveedores", "1", "1503.00",],
            ["15100", "1504", "Samsung", "proveedores", "1", "1504.00",],
            ["15100", "1505", "Sosh", "proveedores", "1", "1503.00",],
            ["15100", "1506", "Free", "proveedores", "0", "1506.00",],
            ["15100", "1600", "FORMULE DE COMPTE ", "La Poste", "1", "1600.00",],
            ["15100", "1601", "DIRECTION GENERAL", "IMPOTS", "1", "1601.00",],
            ["15100", "1602", "MUNOZ ALBUERNO", "movimientos personales", "1", "1602.00",],
            ["15100", "1603", "FORFAITAIRE TRIMESTRIEL", "La Poste", "1", "1600.00",],
            ["15100", "1700", "ACHAT CB", "Compras Carte Blue", "1", "1700.00",],
            ["15100", "1701", "AMAZON", "Compras Carte Blue", "1", "1700.00",],
            ["15100", "1702", "CDISCOUNT", "Compras Carte Blue", "1", "1700.00",],
        );
        foreach ($tabla['movimientos'] as $value) {
            Tabla::factory(1)->create(
                [
                    'tabla' => $value[0],
                    'tabla_id' => $value[1],
                    'nombre' => $value[2],
                    'descripcion' => $value[3],
                    'activo' => $value[4],
                    'valor1' => $value[5],
                ]
            );
        }
    }
}
