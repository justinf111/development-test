<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    public function index()
    {
        $companies = Company::query()->orderBy('updated_at', 'desc')->paginate(10);
        return view('companies.index', ['companies' => $companies]);
    }

    public function create()
    {
        return view('companies.create');
    }

    public function store(CompanyRequest $request)
    {
        return response()->redirectToRoute('companies.index');
    }

    public function edit(Company $company)
    {
        return view('companies.edit', [
            'company' => $company,
        ]);
    }

    public function update(CompanyRequest $request, Company $company)
    {
        return response()->redirectToRoute('companies.index');
    }

    public function destroy(Company $company)
    {
        $company->delete();
        return response()->redirectToRoute('companies.index');
    }
}
