<?php

namespace App\Http\Controllers;

use App\Http\Models\Companies;
use App\Http\Models\Employees;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    public function index()
    {
        if (auth()->check()) {
            $employees = Employees::paginate(5);
            return view('employees.index', compact('employees'));
        } else {
            return redirect()->route('login');
        }
    }

    public function create()
    {
        $companies = Companies::all();
        return view('employees.create', compact('companies'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'companies_id' => 'required|string',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string',
        ]);

        $employees = Employees::create($validatedData);

        return redirect()->route('employees.index', $employees->id)
            ->with('success', 'Employee created  successfully.');
    }

    public function show($id)
    {
        //dd($request->all());
        $employees = Employees::findOrFail($id);
        return view('employees.show', compact('employees'));
    }

    public function edit($id)
    {
        $employees = Employees::findOrFail($id);
        $companies = Companies::all();
        return view('employees.edit', compact('employees', 'companies'));
    }

    public function update(Request $request, $id)
    {
        //dd( $request->all());   
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'companies_id' => 'required|exists:companies,id',
            'email' => 'nullable|email|max:255',
            'phone' => 'required|string|max:255',
        ]);

        $employees = Employees::findOrFail($id);
        $employees->update($validatedData);

        return redirect()->route('employees.show', $id)
            ->with('success', 'Employee updated successfully.');
    }

    public function destroy($id)
    {
        $employees = Employees::findOrFail($id);
        $employees->delete();

        return redirect()->route('employees.index')
            ->with('success', 'Employee deleted successfully.');
    }
}
