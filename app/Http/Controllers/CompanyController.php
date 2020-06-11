<?php

namespace App\Http\Controllers;

use App\Company;
use App\Job;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    //
    public function show($id, $name){
        $company = Company::findOrfail($id);
        return view('companies.show', compact('company'));
    }
}
