<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller 
{
    public function create()
    {
        return view('patients.create'); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer',
            'address' => 'required|string',
            'doctor' => 'required|string',
            'fee' => 'required|numeric'
        ]);

        Patient::create($request->all());

        return redirect()->route('patients.index')->with('success', 'Patient created successfully.');
    }

    public function index()
    {
        $patients = Patient::all();
        return view ('patients')->with('patients',$patients);
    }
}