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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->user()->can('crear-permiso')) {
            return view('permisos');
        }else{
            return redirect()->back();
        }
    }

    public function getPermisos (Request $request)
    {
        if ($request->user()->can('crear-permiso')) {
            $permisos = Permiso::with('roles')->get();
            $roles = Rol::all();

            return response()->json(['permisos' => $permisos,'roles'=>$roles]);
        }else{
            return redirect()->back();
        }
    }

            // foreach(json_decode($request->input('permiso')) as $per)
        //     {
        //         $permiso = Permiso::create([
        //             'slug' => $per->slug,
        //             'descrip' => $per->descrip,
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
        if ($request->user()->can('crear-permiso')) {

        $this->validate($request,[
            'descrip' => 'required',
            'slug' => 'required'
        ]);
 
        $permiso = Permiso::create([
            'slug' => $request->slug,
            'descrip' => $request->descrip,
        ]);

            $permiso->roles()->attach($request->rol);

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
        if ($request->user()->can('crear-permiso')) {

            $permiso = Permiso::findOrFail($request->id);
            $permiso->slug = $request->slug;
            $permiso->descrip = $request->descrip;
            $permiso->save();
            // $rol = Rol::where('slug',$request->roles)->get();
            // dd($request->roles);
            $permiso->roles()->sync($request->roles);

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
        $permiso = Permiso::findOrFail($request->id);
        $permiso->delete();
    }
}
