<?php

namespace App\Http\Controllers\Admin\Experience;

use App\Http\Controllers\Controller;
use App\Models\experience\Experience;
use Illuminate\Http\Request;

class ExperiencesController extends Controller
{

    public function index()
    {
        $experiences = Experience::all();
        return view('admin.experiences.index',compact('experiences'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cargo'=> 'required',
            'tipo_empleo'=> 'required',
            'nombre_empresa'=> 'required',
            'ubicacion'=> 'required',
            'tipo_ubicacion'=> 'required',
            'date_init'=> 'required',
            'date_finish'=> 'required',
            'description'=> 'required',
            'color'=> 'required',
        ]);
        $experiences = $request->all();
        Experience::create($experiences);
        return redirect()->route('admin.experiences.index')->with('success', 'La nueva expericia laboral se a creado con éxito!');
    }

    public function edit(Experience $experience)
    {
        return view('admin.experiences.index', compact('experience'));
    }

    public function update(Request $request, Experience $experience)
    {
        $request->validate([
            'cargo'=> 'required',
            'tipo_empleo'=> 'required',
            'nombre_empresa'=> 'required',
            'ubicacion'=> 'required',
            'tipo_ubicacion'=> 'required',
            'date_init'=> 'required',
            'date_finish'=> 'required',
            'description'=> 'required',
            'color'=> 'required',
        ]);
        $data = $request->all();
        $experience->update($data);
        return redirect()->route('admin.experiences.index')->with('success','La expericia laboral se a editado correctamente');
    }

    public function destroy(Experience $experience)
    {
        $experience->delete();
        return redirect()->route('admin.experiences.index')->with('success','La expericia laboral se a elimado con éxito.');

    }
}
