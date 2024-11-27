<?php

namespace App\Http\Controllers;

use App\Models\Measurement;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MeasurementController extends Controller
{
    public function index()
    {
        $measurements = Measurement::all();

        return view('measurements', compact('measurements'));
    }

    public function create()
    {
        return view('measurements-create'); // Create a separate Blade for this form
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_satuan' => 'required|string|max:255',
        ]);

        Measurement::create($request->all());

        return redirect()->route('measurements.index')->with('success', 'Satuan berhasil ditambahkan.');
    }

    public function edit(Measurement $measurement)
    {
        return view('measurements-edit', compact('measurement'));
    }

    public function update(Request $request, Measurement $measurement)
    {
        $request->validate([
            'nama_satuan' => 'required|string|max:255',
        ]);

        $measurement->update($request->all());

        return redirect()->route('measurements.index')->with('success', 'Satuan berhasil diperbarui.');
    }

    public function destroy(Measurement $measurement)
    {
        $measurement->delete();

        return redirect()->route('measurements.index')->with('success', 'Satuan berhasil dihapus.');
    }
}
