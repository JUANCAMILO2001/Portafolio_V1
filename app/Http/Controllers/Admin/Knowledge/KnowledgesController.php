<?php

namespace App\Http\Controllers\Admin\Knowledge;

use App\Http\Controllers\Controller;
use App\Models\knowledge\Knowledge;
use Illuminate\Http\Request;

class KnowledgesController extends Controller
{

    public function index()
    {
        $knowledges = Knowledge::all();
        return view('admin.knowledges.index', compact('knowledges'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $knowledges = $request->all();
        Knowledge::create($knowledges);
        return redirect()->route('admin.knowledges.index')->with('success', 'El conocimiento se a creado con éxito');
    }

    public function edit(Knowledge $knowledge)
    {
        return view('admin.knowledges.index',compact('knowledge'));
    }

    public function update(Request $request, Knowledge $knowledge)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $data = $request->all();
        $knowledge->update($data);
        return redirect()->route('admin.knowledges.index')->with('success', 'El conocimiento se a editado con éxito');
    }

    public function destroy(Knowledge $knowledge)
    {
        $knowledge->delete();
        return redirect()->route('admin.knowledges.index')->with('success', 'El conocimiento se a eliminado con éxito');
    }
}
