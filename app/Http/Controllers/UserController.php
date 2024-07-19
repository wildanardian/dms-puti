<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\User;
use App\Models\UserUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use OpenSpout\Common\Entity\Row;
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
            $users = User::leftJoin('units', 'users.unit_id', '=', 'units.id')
                ->select('users.id', 'users.name', 'units.name as unit')
                ->orderByRaw('CASE WHEN units.name IS NULL THEN 1 ELSE 0 END')
                ->orderBy('units.name');
            return DataTables::of($users)->addIndexColumn()->make(true);
        }
        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $unit_list = Unit::all();
        $user_type_list = Role::all()->pluck('name');

        if ($request->ajax()) {
            return response()->json(['unit_list' => $unit_list, 'user_type_list' => $user_type_list]);
        }

        return view('users.form');
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

        if ($request->select_user != null) {
            $role = Role::where('name', $request->select_user)->first();
            $user->assignRole($role);
        }

        if ($request->select_unit != null) {
            $unit = Unit::where('id', $request->select_unit)->first();
            $user->unit_id = $unit->id;
        }
        $signature = $request->file('signature');
        if ($signature) {
            $hashedFilename = Hash::make($user->id);
            $signature->storeAs('public/user/' . $user->id, $hashedFilename);
            $user->signature = $hashedFilename;
        }

        $user->save();

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
        $selected_user_type = $user->getRoleNames()->first();
        $unit_list = Unit::all();
        $user_type_list = Role::all()->pluck('name');

        return view('users.form', compact('user', 'selected_user_type', 'unit_list', 'user_type_list'));
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

        if ($request->select_user != null) {
            $role = Role::where('name', $request->select_user)->first();
            $user->assignRole($role);
        }

        if ($request->select_unit != null) {
            $unit = Unit::where('id', $request->select_unit)->first();
            $user->unit_id = $unit->id;
        }

        if ($request->hasFile('signature')) {
            $signature = $request->file('signature');
            $signature->storeAs('public/user', $user->id);
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

    public function getUserType()
    {
        $user_type_list = Role::all()->pluck('name');
        return response()->json(['user_type_list' => $user_type_list]);
    }
}
