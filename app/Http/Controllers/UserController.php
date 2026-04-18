<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Psy\CodeCleaner\UseStatementPass;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();

        return view('admin.index', compact('users'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',            
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'is_admin' => $request -> has('is_admin'),
        ]);

        return redirect()->route('users.index')
        ->with('success', 'Registro exitoso');;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit(User $user)
    {
        return view('admin.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'phone' => 'required',
    ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'is_admin' => $request->has('is_admin'),
        ]);

        return redirect()->route('users.index')
        ->with('success', 'Actualización de usuario exitosa');
    }

    public function destroy(User $user)
    {
        if ($user->id === Auth::id()) {
            return redirect()->route('users.index')
            ->with('warning', 'No puedes eliminar tu propia cuenta.');
        }


        $user -> delete();

        return redirect()->route('users.index')
        ->with('success', 'Usuario eliminado con éxito');
    }
}
