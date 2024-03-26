<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $users = DB::table('users')
                ->leftJoin('user_unit', 'users.id', '=', 'user_unit.user_id')
                ->leftJoin('units', 'user_unit.unit_id', '=', 'units.id')
                ->select('users.id', 'users.name', 'units.name as unit', 'users.created_at')
                ->get();

            return DataTables::of($users)->addIndexColumn()->make(true);
        }
        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $unit = Unit::all()->pluck('name');
        $user_type = Role::all()->pluck('name');

        return view('users.form', compact('unit', 'user_type'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'confirm-password' => 'required|same:password'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $role = Role::where('name', $request->select_role)->first();
        $user->assignRole($role);
        $user->unit()->attach($request->select_unit);

        if ($user) {
            return redirect()->route('users.index')->with('success', 'User created successfully');
        } else {
            return back()->withInput()->with('error', 'Failed to create user');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);

        $unit = [
            'Direktorat Pusat Teknologi Informasi', 'Bagian Riset dan Layanan TI',
            'Urusan Manajemen Mutu', 'Urusan Pengelolaan Konten dan Sumber Daya TI',
            'Urusan Pengguna Layanan', 'Urusan Riset TI', 'Bagian Infrastruktur TI',
            'Urusan Infrastruktur Jaringan TI'
        ];

        $user_type = [
            'Super Admin', 'Direktorat', 'Bagian', 'Urusan', 'Urusan Cosmos', 'Urusan Aplikasi'
        ];

        return view('users.form', compact('user', 'unit', 'user_type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;

        if ($user->save()) {
            return redirect()->route('users.index')->with('success', 'User updated successfully');
        } else {
            return back()->withInput()->with('error', 'Failed to update user');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        if ($user->delete()) {
            return redirect()->route('users.index')->with('success', 'User deleted successfully');
        } else {
            return back()->with('error', 'Failed to delete user');
        }
    }
}
