<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use App\Imports\clienteImport;
use App\Models\backend\Entidad;
use App\Models\backend\Cliente;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    public $saltaLineas;
    /**
     * @return \Illuminate\Support\Collection
     */
    public function index()
    {
        $regs = Cliente::orderBy('id', 'asc')->get();

        return view('banca.Cliente', compact('regs'));
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function import(Request $request)
    {
        $msj[] = "Debe seleccionar un archivo";
        // dd($request->file('file'));
        if ($request->file('file')) {
            foreach ($request->file('file') as $key0 => $value0) {
                $file = $value0->getClientOriginalName();
                // dd($file, $paso, $deYaLeidos, in_array($file, $paso));
                // si no lo ha traspasado lee sus registros
                (new clienteImport)->import($value0);
                $msj[$file] = "Importando registros de: $file\n";
            }
        }

        return back()->with(['success' => $msj]);
    }
}
