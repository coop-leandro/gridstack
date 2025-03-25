<?php

namespace App\Http\Controllers;

use App\Models\Sector;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SetorController extends Controller
{
    public function create()
    {
        $usuarios = User::whereNull('sector_id')->get(); 
        return view('setores.create', compact('usuarios'));
    }

    public function store(Request $request)
    {

        $setor = Sector::create([
            'name' => $request->nome,
            'manager_id' => $request->gerente_id, 
        ]);

        $gerente = User::find($request->gerente_id);
        $gerente->sector_id = $setor->id;
        $gerente->save();

        return redirect()->route('setores.users', $setor->id);
    }

    public function usuarios(Sector $setor)
    {
        $usuarios = User::where('sector_id', $setor->id)->get(); 
        $todosUsuarios = User::whereNull('sector_id')->get();
        $manager = User::where('id', $setor->manager->id)->first();
        $managerName = $manager->name;
        //dd($setor);
        return view('setores.users', compact('setor', 'usuarios', 'todosUsuarios', 'managerName'));
    }

    public function adicionarUsuarios(Request $request, Sector $setor)
    {
        foreach ($request->usuarios as $usuarioId) {
            $usuario = User::find($usuarioId);
            $usuario->sector_id = $setor->id;
            $usuario->save();
        }

        return redirect()->route('setores.users', $setor->id);
    }
}
