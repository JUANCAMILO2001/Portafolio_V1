<?php

namespace App\Http\Controllers\Admin\Job;

use App\Http\Controllers\Controller;
use App\Models\job\Job;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    public function index()
    {
        $jobs = Job::all();
        return view('admin.jobs.index', compact('jobs'));
    }

    public function store(Request $request)
    {
        $request->validate([
           'tag' => 'nullable',
           'title' => 'required',
           'client' => 'nullable',
           'lenguajes' => 'nullable',
           'url' => 'required',
           'color' => 'required',
           'description' => 'nullable',
        ]);
        $jobs = $request->all();
        if ($request->hasFile('imagen')){
            $imagen = $request->file('imagen');
            $imagenPath = public_path('storage/profiles/portafolio/');
            $imagenName = date('YmdHis') . '.' . $imagen->getClientOriginalExtension();
            $imagen->move($imagenPath,$imagenName);
            $jobs['imagen'] = 'profiles/portafolio/' . $imagenName;
        }

        Job::create($jobs);
        return redirect()->route('admin.jobs.index')->with('success', 'El nuevo trabajo se ha creado con éxito.');
    }

    public function edit(Job $job)
    {
        return view('admin.jobs.index', compact('job'));
    }

    public function update(Request $request, Job $job)
    {
        $request->validate([
            'tag' => 'nullable',
            'title' => 'required',
            'client' => 'nullable',
            'lenguajes' => 'nullable',
            'url' => 'required',
            'color' => 'required',
            'description' => 'nullable',
        ]);
        $data = $request->all();
        if ($request->hasFile('imagen')){
            $imagen = $request->file('imagen');
            $imagenPath = 'storage/profiles/portafolio/';
            $imagenName = date('YmdHis') . '.' . $imagen->getClientOriginalExtension();
            $imagen->move($imagenPath,$imagenName);
            $data['imagen'] = 'profiles/portafolio/' . $imagenName;
            if ($job->imagen){
                $imagenAnterior = public_path('storage/profiles/portafolio/' . $job->imagen);
                if (file_exists($imagenAnterior)){
                    unlink($imagenAnterior);
                }
            }else{
                unset($data['imagen']);
            }
        }
        $job->update($data);
        return redirect()->route('admin.jobs.index')->with('success', 'El trabajo se ha actualizado éxitosamente.');
    }

    public function destroy(Job $job)
    {
        $job->delete();
        return redirect()->route('admin.jobs.index')->with('success', 'El trabajo se ha eliminado éxitosamente.');
    }
}
