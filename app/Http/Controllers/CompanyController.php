<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Companies;
use Illuminate\Support\Facades\Notification;
use App\Notifications\CompanyCreatedNotification;

class CompanyController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            $companies = Companies::paginate(10);
            return view('companies.index', compact('companies'));
        } else {
            return redirect()->route('login');
        }
    }

    public function create()
    {
        return view('companies.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'logo' => 'required|image|mimes:jpeg,png,jfif,jpg,gif,svg|max:2048|dimensions:min_width=100,min_height=100',
        ]);

        $companies = Companies::create($validatedData);

        if ($companies->email) {
            Notification::route('mail', $companies->email)
                ->notify(new CompanyCreatedNotification($companies));
        }

        return redirect()->route('companies.index', $companies->id)
            ->with('success', 'Company created successfully. Check your email for verification.');
    }

    public function show($id)
    {
        $companies = Companies::findOrFail($id);
        return view('companies.show', compact('companies'));
    }

    public function edit($id)
    {
        $companies = Companies::findOrFail($id);
        return view('companies.edit', compact('companies'));
    }

    public function update(Request $request)
    {
        $id = $request->get('company_id');
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jfif,jpg,gif,svg|max:2048|dimensions:min_width=100,min_height=100',
        ]);

        $companies = Companies::findOrFail($id);

        $companies->update($validatedData);

        return redirect()->route('companies.index', $id)
            ->with('success', 'Company updated successfully.');
    }

    public function destroy($id)
    {
        $companies = Companies::findOrFail($id);
        $companies->delete();

        return redirect()->route('companies.index')
            ->with('success', 'Company deleted successfully.');
    }

    public function verifyCompany($id)
    {
        $company = Companies::findOrFail($id);
        return view('companies.verification');
    }
}
