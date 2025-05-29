<?php

namespace App\Http\Controllers;

use App\Models\Solicitud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SolicitudController extends Controller
{
    public function index()
    {
        $solicitudes = DB::table('solicitud')->get();
        return view("solicitud/index", ['solicitudes' => $solicitudes]);
    }

    public function create()
    {
        return view('solicitud.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tema' => 'required',
            'descripcion' => 'required',
            'aera' => 'required|in:ti,contabilidad,administracion,operador',
            'estado' => 'required|in:solicitado,aprovado,rechazado',
            'usuario' => 'boolean',
        ]);

        Solicitud::create([
            'tema' => $request->tema,
            'descripcion' => $request->descripcion,
            'aera' => $request->aera,
            'estado' => $request->estado,
            'usuario' => $request->has('usuario'),
        ]);

        return redirect()->route('solicitud.index')->with('success', 'Solicitud creada correctamente');
    }

    public function show(Solicitud $solicitud)
    {

    }

    public function edit(Solicitud $solicitud)
    {
        return view('solicitud.edit', compact('solicitud'));
    }

    public function update(Request $request, Solicitud $solicitud)
    {
        $request->validate([
            'tema' => 'required',
            'descripcion' => 'required',
            'aera' => 'required|in:ti,contabilidad,administracion,operador',
            'estado' => 'required|in:solicitado,aprovado,rechazado',
            'usuario' => 'boolean',
        ]);

        $solicitud->update([
            'tema' => $request->tema,
            'descripcion' => $request->descripcion,
            'aera' => $request->aera,
            'estado' => $request->estado,
            'usuario' => $request->has('usuario'),
        ]);

        return redirect()->route('solicitud.index')->with('success', 'Solicitud actualizada correctamente');
    }

    public function destroy(Solicitud $solicitud)
    {
        $solicitud->delete();
        return redirect()->route('solicitud.index')->with('success', 'Solicitud eliminada correctamente');
    }
}
