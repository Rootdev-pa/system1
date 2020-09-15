<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Permiso;
use App\Rol;
use App\User;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class UsuarioController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth'); 
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->user()->can('ver-usuarios')) {
            return view('usuarios');
        }else{
            return redirect()->back();
        }
    }

    public function getUsuarios (Request $request)
    {
        if ($request->user()->can('ver-usuarios')) {
            $usuarios = User::with('roles','permisos')->get();
            $permisos = Permiso::all();
            $roles = Rol::all();

            return response()->json(['usuarios' => $usuarios, 'roles'=>$roles,'permisos' => $permisos]);
        }else{
            return redirect()->back();
        }
    }

            // foreach(json_decode($request->input('usuario')) as $per)
        //     {
        //         $usuario = Permiso::create([
        //             'slug' => $per->slug,
        //             'email' => $per->email,
        //         ]);

        //     }
        // }else{
        //     return redirect()->back();
        // } 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->user()->can('crear-usuarios')) {

            $this->validate($request,[
                'name' => 'required',
                'email' => 'required'
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->contraseña),
            ]);

                $user->roles()->attach($request->roles);
                $user->permisos()->attach($request->permisos);

        }else{
            return redirect()->back();
        }    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if ($request->user()->can('actualizar-usuarios')) {
        dd($request->user()->get());
        
        $usuario = User::findOrFail($request->id);
            $usuario->name = $request->name;
            $usuario->email = $request->email;
            $usuario->save();

            $usuario->roles()->sync($request->roles);
            $usuario->permisos()->sync($request->permisos);

        }else{
            return redirect()->back();
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Request $request)
    {
        if ($request->user()->can('eliminar-usuarios')) {
        $usuario = User::findOrFail($request->id);
        $usuario->delete();
        }
    }
}
