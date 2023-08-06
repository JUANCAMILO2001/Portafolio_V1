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

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
