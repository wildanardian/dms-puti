<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $units = Unit::select('*');
            return DataTables::of($units)->addIndexColumn()->make(true);
        }
        return view('units.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('units.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $unit = Unit::create($request->all());

        if($unit) {
            toastr()->success('Unit created successfully.');
            return redirect()->route('units.index');
        }else {
            toastr()->error('Failed to create unit.');
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Unit $unit)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Unit $unit)
    {
        $unit = Unit::find($unit->id);
        return view('units.form', compact('unit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Unit $unit)
    {
        $unit = Unit::find($unit->id);

        $request->validate([
            'name' => 'required',
        ]);

        $unit->name = $request->name;

        if($unit->save()){
            toastr()->success('Unit updated successfully.');
            return redirect()->route('units.index');
        }else {
            toastr()->error('Failed to update unit.');
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Unit $unit)
    {
        $unit = Unit::find($unit->id);
        $unit->delete();

        if($unit) {
            toastr()->success('Unit deleted successfully.');
            return redirect()->back();
        } else {
            toastr()->error('Failed to delete unit.');
            return back();
        }
    }
}
