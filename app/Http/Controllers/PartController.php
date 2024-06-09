<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Part;
use Illuminate\Http\Request;

class PartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Part::query();

        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->filled('serialnumber')) {
            $query->where('serialnumber', 'like', '%' . $request->serialnumber . '%');
        }

        if ($request->filled('car_id')) {
            $query->where('car_id', $request->car_id);
        }

        $parts = $query->with('car')->get();

        return view('parts.index', compact('parts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cars = Car::all();
        return view('parts.create', compact('cars'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'serialnumber' => 'required',
            'car_id' => 'required|exists:cars,id',
        ]);

        Part::create($request->all());

        return redirect()->route('parts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Part $part)
    {
        return view('parts.show', compact('part'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Part $part)
    {
        $cars = Car::all();
        return view('parts.edit', compact('part', 'cars'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Part $part)
    {
        $request->validate([
            'name' => 'required',
            'serialnumber' => 'required',
            'car_id' => 'required|exists:cars,id',
        ]);

        $part->update($request->all());

        return redirect()->route('parts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Part $part)
    {
        $part->delete();

        return redirect()->route('parts.index');
    }
}
