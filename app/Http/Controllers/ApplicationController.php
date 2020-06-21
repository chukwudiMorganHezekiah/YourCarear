<?php

namespace App\Http\Controllers;

use App\Application;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Cache;



class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,User $user)
    {
        //
        if(!$request->file){


            $validate=$request->validate([
                'cover_letter'=>'required',
                'user_email'=>'required',
                'mobile_no'=>'required',
                'user_id'=>'required',
                'cv'=>'required',
                'job_id'=>'required'

            ]);




            $saved=\App\Application::create($validate);
            if($saved){
                return "saved";


            }





        }else{
            $validate=$request->validate([
                'cover_letter'=>'required',
                'user_email'=>'required',
                'mobile_no'=>'required',
                'user_id'=>'required',
                'job_id'=>'required'


            ]);

            $split=explode(',',$request->cv);
            $decoded=base64_decode($split[1]);


            if(str_contains($split[0],'vnd.openxmlformats-officedocument.wordprocessingml.document')){
                $extension='docx';

            }else{
                return "Please upload a .docx file";
            }

            $filenametosave=str_random(9).'.'.$extension;
            $path='./storage/cvs/applications/'.$filenametosave;

            if(file_put_contents($path,$decoded)){
                $merged=array_merge(['cv'=>'/applications/'.$filenametosave],$validate);
                $saved=\App\Application::create($merged);
                if($saved){
                    return "saved";


                }

            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function show(Application $application)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function edit(Application $application)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Application $application)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function destroy(Application $application)
    {
        //
    }
}
