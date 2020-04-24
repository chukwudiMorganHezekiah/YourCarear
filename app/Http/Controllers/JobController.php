<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;
use DB;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->authorize('create',\App\Job::class);
        $user=auth()->user()->id;
        //$jobs=\App\Job::where('user_id',$user)->where()->get();
       // $jobs=\App\Job::select(\DB::raw(" job_title,job_description"))
        //->distinct('job_title')
       // ->paginate(2);
       $jobs=DB::table('jobs')
       ->select('job_title','id')
       ->distinct()
       ->paginate(2);

//dd($jobs->count());


        return view('job.index',compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("loggedLayouts.post_a_job");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $data=$request->validate([
            'job_Industry'=>'required|min:3',
            'job_description'=>'required|min:3',
            'job_title'=>'required|min:3',

        ]);


        $datanow=array_merge([
            'company_id'=>auth()->user()->company->id,
            'user_id'=>auth()->user()->id,
        ],$data);

        $saved=\App\Job::create($datanow);

        //event
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        //
        $applications=\App\Application::where('job_id',$job->id)->get();
        
        return view('job.edit',compact('applications'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        //
    }
}
