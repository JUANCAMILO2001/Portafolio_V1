<?php

namespace App\Http\Controllers\Admin\Workigskill;

use App\Http\Controllers\Controller;
use App\Models\workingskill\Workingskill;
use Illuminate\Http\Request;

class WorkingskillsController extends Controller
{
    public function index()
    {
        $workingskills = Workingskill::all();
        return view('admin.workingskills.index',compact('workingskills'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'porcentage' => 'required',
            'color' => 'required',
        ]);
        $workingskills = $request->all();
        Workingskill::create($workingskills);
        return redirect()->route('admin.workingskills.index')->with('success', 'La workingSkill se ha creado exitosamente');
    }

    public function edit(Workingskill $workingskill)
    {
        return view('admin.workingskills.index',compact('workingskill'));
    }

    public function update(Request $request, Workingskill $workingskill)
    {
        $request->validate([
            'title' => 'required',
            'porcentage' => 'required',
            'color' => 'required',
        ]);
        $data = $request->all();
        $workingskill->update($data);
        return redirect()->route('admin.workingskills.index')->with('success', 'La workingSkill se ha editado exitosamente');

    }

    public function destroy(Workingskill $workingskill)
    {
        $workingskill->delete();
        return redirect()->route('admin.workingskills.index')->with('success', 'La workingSkill se ha Eliminado exitosamente');
    }
}
