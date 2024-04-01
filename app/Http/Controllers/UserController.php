<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\User;
use App\Models\UserUnit;
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
                ->whereNull('users.deleted_at')
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
            'confirm-password' => 'required|same:password',
            'signature' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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

        if ($request->hasFile('signature')) {
            $signature = $request->file('signature');
            $signature_name = time() . '.' . $signature->getClientOriginalExtension();
            $signature->move(public_path('images/signatures'), $signature_name);
            $user->signature = $signature_name;
            $user->save();
        }

        if ($request->select_user != null) {
            $role = Role::where('name', $request->select_user)->first();
            $user->assignRole($role);
        }

        if ($request->select_unit != null) {
            $unit = Unit::where('id', $request->select_unit)->first();

            UserUnit::create([
                'user_id' => $user->id,
                'unit_id' => $unit->id,
            ]);
        }

        if ($user) {
            toastr()->success('User created successfully.');
            return redirect()->route('users.index');
        } else {
            toastr()->error('Failed to create user.');
            return back()->withInput();
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
        $unit = Unit::all()->pluck('name');
        $user_type = Role::all()->pluck('name');
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
        $user->updated_at = now();

        if ($request->hasFile('signature')) {
            $signature = $request->file('signature');
            $signature_name = time() . '.' . $signature->getClientOriginalExtension();
            $signature->move(public_path('images/signatures'), $signature_name);
            $user->signature = $signature_name;
            $user->save();
        }

        if ($request->select_user != null) {
            $role = Role::where('name', $request->select_user)->first();
            $user->assignRole($role);
        }

        if ($request->select_unit != null) {
            $unit = Unit::where('id', $request->select_unit)->first();

            UserUnit::create([
                'user_id' => $user->id,
                'unit_id' => $unit->id,
            ]);
        }

        if ($user->save()) {
            toastr()->success('User updated successfully.');
            return redirect()->route('users.index');
        } else {
            toastr()->error('Failed to update user.');
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        if ($user->delete()) {
            toastr()->success('User deleted successfully.');
            return redirect()->back();
        } else {
            toastr()->error('Failed to delete user.');
            return back();
        }
    }
}
