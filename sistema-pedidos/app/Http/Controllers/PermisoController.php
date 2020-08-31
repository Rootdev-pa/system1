<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permiso;
use App\Rol;
use App\User;
class PermisoController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth'); 
    }

    public function index(Request $request)
    {
        if ($request->user()->can('crear-permiso')) {
            return view('ListaPermisos');
        }else{
            return redirect()->back();

        }

    }
    
    public function store(Request $request)
    {
        if ($request->user()->can('crear-permiso')) {
            //Code goes here
        }
    }
    
    public function destroy(Request $request, $id)
    {   
        if ($request->user()->can('delete-permiso')) {
          //Code goes here
        }
    
    }

    public function permisos(Request $request)
    {
        if ($request->user()->can('crear-permiso')) {
            $users = User::with(['roles','permisos'])->get();
            $permisos = permiso::all();
            return response()->json(['users' => $users, 'permisos' => $permisos]);
        }else{
            return redirect()->back();
        }

    }

    public function editrol(Request $request, $id)
    {
        if ($request->user()->can('crear-permiso')) {
            return Rol::find('user_id',$id)->get();
        }else{
            return redirect()->back();
        }

    }
    
    public function Permiso()
    {   
        return redirect()->back();
    }
}
