<?php

namespace App\Http\Controllers\Admin\Socialnetworks;

use App\Http\Controllers\Controller;
use App\Models\socialnetwok\Socialnetwork;
use Illuminate\Http\Request;

class SocialnetworksController extends Controller
{

    public function index()
    {
        $socialnetworks = Socialnetwork::all();
        return view('admin.socialnetworks.index',compact('socialnetworks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'link' => 'required',
            'color' => 'required',
            'logo' => 'required',
        ]);
        $socialnetworks = $request->all();
        Socialnetwork::create($socialnetworks);
        return redirect()->route('admin.socialnetworks.index')->with('success', 'La red social se ha creado correctamente.');
    }

    public function edit(string $socialnetwork)
    {
        Socialnetwork::all();
        return view('admin.socialnetworks.index', compact('socialnetwork'));
    }

    public function update(Request $request, Socialnetwork $socialnetwork)
    {
        $request->validate([
            'name' => 'required',
            'link' => 'required',
            'color' => 'required',
            'logo' => 'required',
        ]);
        $data = $request->all();
        $socialnetwork->update($data);
        return redirect()->route('admin.socialnetworks.index')->with('success', 'La res social se edito con éxito!');
    }

    public function destroy(Socialnetwork $socialnetwork)
    {
        $socialnetwork->delete();
        return redirect()->route('admin.socialnetworks.index')->with('error', 'La red social se elimino con exito.');
    }
}
