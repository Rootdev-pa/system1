<?php

namespace App\Http\Controllers;
use App\Rol;
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
        if ($request->user()->can('crear-permiso')) {
            return view('roles');
        }else{
            return redirect()->back();
        }
    }

    public function getRoles (Request $request)
    {
        if ($request->user()->can('crear-permiso')) {
            $roles = Rol::all();
            return response()->json(['roles' => $roles]);
        }else{
            return redirect()->back();
        }
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'descrip' => 'required',
            'slug' => 'required'
        ]);
 
        $rol = Rol::create([
            'slug' => $request->slug,
            'descrip' => $request->descrip,

        ]);    
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
        $rol = Rol::findOrFail($request->id);
        $rol->slug = $request->slug;
        $rol->descrip = $request->descrip;
        $rol->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Request $request)
    {
        $rol = Rol::findOrFail($request->id);
        $rol->delete();
    }
}
