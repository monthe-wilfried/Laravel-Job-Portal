<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    //
    public function index(){
        $jobs = Job::orderBy('created_at', 'desc')->paginate(10);
        return view('welcome', compact('jobs'));
    }

    public function show($id, $job){
        $job = Job::findOrfail($id);
        return view('jobs.show', compact('job'));
    }

}
