<?php

namespace App\Http\Controllers;

use App\Category;
use App\Company;
use App\Http\Requests\JobRequest;
use App\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class JobController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['employer', 'verified'], ['except'=>['index', 'show', 'apply', 'allJobs']]);
    }

    public function index(){
        $jobs = Job::latest()->where('status', 1)->limit(10)->get();
        $companies = Company::all()->random(8);
        return view('welcome', compact('jobs', 'companies'));
    }

    public function show($id, $job){
        $job = Job::findOrfail($id);
        return view('jobs.show', compact('job'));
    }

    public function myJobs(){
        $jobs = Job::where('user_id', Auth::id())->paginate(10);
        return view('jobs.my-jobs', compact('jobs'));
    }

    public function create(){
        $categories = Category::orderBy('name', 'asc')->get();
        return view('jobs.create', compact('categories'));
    }

    public function edit($id, $slug){
        $job = Job::findOrFail($id);
        $categories = Category::orderBy('name', 'asc')->get();
        return view('jobs.edit', compact('job', 'categories'));
    }

    public function store(JobRequest $request){
        $inputs = $request->all();
        $inputs['user_id'] = Auth::id();
        $inputs['company_id'] = Auth::user()->company->id;
        $inputs['slug'] = Str::slug($request->title);
        Job::create($inputs);
        return redirect()->back()->with('success', 'Job Created with Success');
    }

    public function update(JobRequest $request){
        $job = Job::where('user_id', Auth::id())->first();
        $inputs = $request->all();
        $inputs['slug'] = Str::slug($request->title);
        $job->update($inputs);
        return redirect()->back()->with('success', 'Job Updated with Success');
    }

    public function apply($id){
        $user_id = Auth::id();
        $job = Job::findOrFail($id);
        $job->users()->attach($user_id);
        return redirect()->back()->with('success', 'Application sent successfully!');
    }

    public function applicants(){
        $jobs = Job::has('users')->where('user_id', Auth::id())->get();
        return view('jobs.applicants', compact('jobs'));
    }

    public function allJobs(Request $request){
        $keyword = $request->title;
        $type = $request->type;
        $category = $request->category_id;
        $address = $request->address;

        if ($keyword){
            $jobs = Job::where('title', 'LIKE', '%'.$keyword.'%')->where('status', 1)->paginate(10);
        }
        elseif ($type){
            $jobs = Job::where('type', $type)->where('status', 1)->paginate(10);
        }
        elseif ($category){
            $jobs = Job::where('category_id', $category)->where('status', 1)->paginate(10);
        }
        elseif ($address){
            $jobs = Job::where('address', 'LIKE', '%'.$address.'%')->where('status', 1)->paginate(10);
        }
        else{
            $jobs = Job::latest()->where('status', 1)->paginate(10);
        }

        return view('jobs.all-jobs', compact('jobs'));
//        if ($keyword || $type || $category || $address){
//            $jobs = Job::where('title', 'LIKE', '%'.$keyword.'%')
//                ->where('type', $type)
//                ->where('category_id', $category)
//                ->orWhere('address', 'LIKE', '%'.$address.'%')
//                ->paginate(10);
//            return view('jobs.all-jobs', compact('jobs'));
//        }
//        else{
//            $jobs = Job::latest()->where('status', 1)->paginate(10);
//
//        }

    }

}
