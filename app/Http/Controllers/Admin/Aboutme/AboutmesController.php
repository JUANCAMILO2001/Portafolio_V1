<?php

namespace App\Http\Controllers\Admin\Aboutme;

use App\Http\Controllers\Controller;
use App\Models\aboutme\Aboutme;
use Illuminate\Http\Request;

class AboutmesController extends Controller
{

    public function index()
    {
        $aboutmes = Aboutme::all();
        return view('admin.aboutmes.index', compact('aboutmes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title_skill' => 'required',
            'description_skill' => 'required',
            'color_skill' => 'required',
        ]);

        $aboutmes = $request->all();

        if ($request->hasFile('logo_skill')) {
            $logo_skill = $request->file('logo_skill');
            $logo_skillPath = public_path('storage/profiles/user/');
            $logo_skillName = date('YmdHis') . '.' . $logo_skill->getClientOriginalExtension();
            $logo_skill->move($logo_skillPath,$logo_skillName);
            $aboutmes['logo_skill'] = 'profiles/user/' . $logo_skillName;
        }
        Aboutme::create($aboutmes);
        return redirect()->route('admin.aboutmes.index')->with('success', 'La nueva skill se a creado con éxito.');
    }

    public function edit(Aboutme $aboutme)
    {
        Aboutme::all();
        return view('admin.aboutmes.index', compact('aboutme'));
    }

    public function update(Request $request, Aboutme $aboutme)
    {
        $request->validate([
            'title_skill' => 'required',
            'description_skill' => 'required',
            'color_skill' => 'required',
        ]);
        $data = $request->all();
        if ($request->hasFile('logo_skill')) {
            $logo_skill = $request->file('logo_skill');
            $logo_skillPath = 'storage/profiles/user/';
            $logo_skillName = date('YmdHis') . '.' . $logo_skill->getClientOriginalExtension();
            $logo_skill->move($logo_skillPath, $logo_skillName);
            $data['logo_skill'] = 'profiles/user/' . $logo_skillName;
            // Eliminar la imagen anterior si existe
            if ($aboutme->logo_skill) {
                $logo_skillAnterior = public_path('storage/profiles/user/' . $aboutme->logo_skill);
                if (file_exists($logo_skillAnterior)) {
                    unlink($logo_skillAnterior);
                }
            }
        } else{
            unset($data['logo_skill']);
        }
        $aboutme->update($data);

        return redirect()->route('admin.aboutmes.index')->with('success', 'La skill se ha actualizado correctamente.');
    }
    public function destroy(Aboutme $aboutme)
    {
        $aboutme->delete();
        return redirect()->route('admin.aboutmes.index')->with('success', 'La skill se ha eliminado correctamente.');
    }
}
