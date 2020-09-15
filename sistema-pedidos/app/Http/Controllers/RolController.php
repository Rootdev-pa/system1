<?php

namespace App\Http\Controllers;
use App\Rol;
use App\Permiso;
use Illuminate\Http\Request;

class RolController extends Controller
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
        if ($request->user()->can('ver-roles')) {
            return view('roles');
        }else{
            return redirect()->back();
        }
    }

    public function getRoles (Request $request)
    {
        if ($request->user()->can('ver-roles')) {
            $permisos = Permiso::all();
            $roles = Rol::with('permisos')->get();
            return response()->json(['permisos' => $permisos,'roles'=>$roles]);
        }else{
            return redirect()->back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->user()->can('crear-roles')) {

            $this->validate($request,[
                'descrip' => 'required',
                'slug' => 'required'
            ]);
     
            $rol = Rol::create([
                'slug' => $request->slug,
                'descrip' => $request->descrip,
            ]);
    
                $rol->permisos()->attach($request->permisos);
    
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


        if ($request->user()->can('actualizar-roles')) {

            $rol = Rol::findOrFail($request->id);
            $rol->slug = $request->slug;
            $rol->descrip = $request->descrip;
            $rol->save();
            // $rol = Rol::where('slug',$request->roles)->get();
            // dd($request->roles);
            $rol->permisos()->sync($request->permisos);

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
        if ($request->user()->can('eliminar-roles')) {
        $rol = Rol::findOrFail($request->id);
        $rol->delete();
        }else{
            return redirect()->back();
        } 
    }
}
