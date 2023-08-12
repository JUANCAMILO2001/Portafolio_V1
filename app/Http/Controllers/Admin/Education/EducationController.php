<?php

namespace App\Http\Controllers\Admin\Education;

use App\Http\Controllers\Controller;
use App\Models\education\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index()
    {
        $educations = Education::all();
        return view('admin.educations.index',compact('educations'));
    }
    public function store(Request $request)
    {
        $request->validate([
           'institution'=> 'required',
           'title'=> 'required',
           'date_init'=> 'required',
           'date_finish'=> 'required',
           'activity'=> 'required',
           'description'=> 'required',
           'color'=> 'required',
        ]);
        $educations = $request->all();
        Education::create($educations);
        return redirect()->route('admin.educations.index')->with('success', 'La Nueva educación se a creado con éxito!');
    }
    public function edit(Education $education)
    {
        return view('admin.educations.index', compact('education'));
    }
    public function update(Request $request, Education $education)
    {
        $request->validate([
            'institution'=> 'required',
            'title'=> 'required',
            'date_init'=> 'required',
            'date_finish'=> 'required',
            'activity'=> 'required',
            'description'=> 'required',
            'color'=> 'required',
        ]);
        $data = $request->all();
        $education->update($data);
        return redirect()->route('admin.educations.index')->with('success','La educación se a editado correctamente');
    }
    public function destroy(Education $education)
    {
        $education->delete();
        return redirect()->route('admin.educations.index')->with('success','La educación se elimino con éxito!');
    }
}
