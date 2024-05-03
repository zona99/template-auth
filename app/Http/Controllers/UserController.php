<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //index
    public function index()
    {
        $users = User::where([
            ['name', 'like', '%' . request('name') . '%'],
            ['role', 'sekolah'],
        ])
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('pages.users.index', compact('users'));
    }

    //show
    public function show($jenjang)
    {
        $users = User::where([
            ['name', 'like', '%' . request('name') . '%'],
            ['role', 'sekolah'],
            ['jenjang', $jenjang],
        ])
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('pages.users.index', compact('users'));
    }

    //create
    public function create()
    {
        return view('pages.users.create');
    }

    //store
    public function store(Request $request)
    {
        $request->validate([
            'npsn' => 'required|unique:users,npsn|min:6|max:10',
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
        ],
        [
            'npsn.required' => 'Data masih kosong',
            'name.required' => 'Data masih kosong',
            'email.required' => 'Data masih kosong',

            'npsn.unique' => 'Data sudah digunaan',
            'email.unique' => 'Data sudah digunaan',
        ]);

        User::create([
            'npsn' => $request->npsn,
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'jenjang' => $request->jenjang,
            'password' => Hash::make('12345678'),
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully');
    }

    //edit
    public function edit(User $user)
    {
        return view('pages.users.edit', compact('user'));
    }

    //update
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ],
        [
            'name.required' => 'Data masih kosong',
            'email.required' => 'Data masih kosong',
        ]);

        $user->update([
            'npsn' => $request->npsn,
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'jenjang' => $request->jenjang,
        ]);

        //if password filled
        if ($request->password) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);
        }

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    //destroy
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }
}
