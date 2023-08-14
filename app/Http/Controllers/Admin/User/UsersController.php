<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;


class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'email' => ['required', 'email', Rule::unique('users')],
            'password' => 'required',
            'profile_photo_path' => 'required|image|mimes:jpeg,png,jpg,gif',
            'phone' => 'required',
            'birthdate' => 'required|date',
            'address' => 'required',
            'cv' => 'required|mimes:pdf',
            'descriptionprofesional' => 'required',
            'descriptionAboutme' => 'required',
        ]);

        $users = $request->all();

        if ($request->hasFile('profile_photo_path')) {
            $profilePhoto = $request->file('profile_photo_path');
            $profilePhotoPath = public_path('storage/profiles/user/');
            $profilePhotoName = date('YmdHis') . '.' . $profilePhoto->getClientOriginalExtension();
            $profilePhoto->move($profilePhotoPath,$profilePhotoName);
            $users['profile_photo_path'] = 'profiles/user/' . $profilePhotoName;
        }
        if ($request->hasFile('cv')) {
            $cvFile = $request->file('cv');
            $cvPath = public_path('storage/profiles/user/');
            $cvName = 'CV_Juan_Ramirez' . '.' . $cvFile->getClientOriginalExtension();
            $cvFile->move($cvPath,$cvName);
            $users['cv'] = 'profiles/user/' . $cvName;
        }

        User::create($users);

        return redirect()->route('admin.users.index')->with('success', 'El usuario se ha creado correctamente.');
    }

    public function edit(User $user)
    {
        return view('admin.users.index', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'email' => ['required', 'email'],
            'phone' => 'required',
            'birthdate' => 'nullable|date',
            'address' => 'required',
            'descriptionprofesional' => 'required',
            'descriptionAboutme' => 'nullable',
        ]);
        $data = $request->all();
        // Verificar si se proporcionó una nueva contraseña
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            // Eliminar la clave "password" del array si no se proporcionó una nueva contraseña
            unset($data['password']);
        }

        if ($request->hasFile('profile_photo_path')) {
            $profilePhoto = $request->file('profile_photo_path');
            $profilePhotoPath = 'storage/profiles/user/';
            $profilePhotoName = date('YmdHis') . '.' . $profilePhoto->getClientOriginalExtension();
            $profilePhoto->move($profilePhotoPath, $profilePhotoName);
            $data['profile_photo_path'] = 'profiles/user/' . $profilePhotoName;
            // Eliminar la imagen anterior si existe
            if ($user->profile_photo_path) {
                $imagenAnterior = public_path('storage/profiles/user/' . $user->profile_photo_path);
                if (file_exists($imagenAnterior)) {
                    unlink($imagenAnterior);
                }
            }
        } else{
            unset($data['profile_photo_path']);
        }

        if ($request->hasFile('cv')) {
            $cvFile = $request->file('cv');
            $cvPath = 'storage/profiles/user/';
            $cvName = 'CV_Juan_Ramirez' . '.' . $cvFile->getClientOriginalExtension();
            $cvFile->move($cvPath,$cvName);
            $data['cv'] = 'profiles/user/' . $cvName;
            // Eliminar la imagen anterior si existe
            if ($user->cv) {
                $cvAnterior = public_path('storage/profiles/user/' . $user->cv);
                if (file_exists($cvAnterior)) {
                    unlink($cvAnterior);
                }
            }
        } else{
            unset($data['cv']);
        }
        $user->update($data);

        return redirect()->route('admin.users.index')->with('success', 'El usuario se ha actualizado correctamente.');
    }

    public function destroy(User $user)
    {
        // Delete profile photo and CV files
        if ($user->profile_photo_path) {
            Storage::delete($user->profile_photo_path);
        }
        if ($user->cv) {
            Storage::delete($user->cv);
        }
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'El usuario se ha eliminado correctamente.');
    }
}
