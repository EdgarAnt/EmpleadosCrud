<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $datos['empleados']=Empleado::paginate(5);
        return view('empleado.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('empleado.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $campos=[
            'Nombre'=>'required|string',
            'ApellidoPaterno'=>'required|string|',
            'ApellidoMaterno'=>'required|string|',
            'Correo'=>'required|email',
            'Foto'=>'required|mimes:jpeg,png,jpg',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            'Foto.required'=>'La foto requerida'
        ];

        $this->validate($request, $campos, $mensaje);




        // $datosEmpleado = request()->all();
        $datosEmpleado = request()->except('_token');
        if($request->hasFile('Foto')){
            $datosEmpleado['Foto']=$request->file('Foto')->store('uploads','public');
        }
        //except the token, en save all the information
        Empleado::insert($datosEmpleado);
        // return response()->json($datosEmpleado);

        return redirect('empleado')->with('mensaje','Empleado agregado con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $empleado = Empleado::findOrFail($id);

        return view('empleado.edit', compact('empleado') );

    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $campos=[
            'Nombre'=>'required|string',
            'ApellidoPaterno'=>'required|string|',
            'ApellidoMaterno'=>'required|string|',
            'Correo'=>'required|email',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];

        if($request->hasFile('Foto')){
            $campos=['Foto'=>'required|mimes:jpeg,png,jpg'];
            $mensaje=['Foto.required'=>'La foto requerida'];


        }

        $this->validate($request, $campos, $mensaje);

        

        //
        $datosEmpleado = request()->except(['_token','_method']);
        Empleado::where('id','=',$id)->update($datosEmpleado);

        $empleado = Empleado::findOrFail($id);

        return view('empleado.edit', compact('empleado') );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        Empleado::destroy($id);
        return redirect('empleado')->with('mensaje',('Empleado Borrado'));
    }
}
