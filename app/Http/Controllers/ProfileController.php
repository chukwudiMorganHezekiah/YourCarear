<?php

namespace App\Http\Controllers;

use App\AboutUser;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Events\NewUserCreatedEvent;
use Illuminate\Support\Facades\Cache;

class ProfileController extends Controller
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
    public function store(Request $request)
    {
        $data=$request->validate([
            'industryInterest'=>'required',
            'profile_image'=>'required|image',
            'cv'=>'required|mimes:docx'


        ]);
        //event(new NewUserCreatedEvent($data));

        if($request->hasFile("profile_image")){
            $filenamewithExtension=$request->file('profile_image')->getClientOriginalName();
            $filext=$request->file('profile_image')->getClientOriginalExtension();
            $filenamewithoutExtension=pathInfo($filenamewithExtension,PATHINFO_FILENAME);
            $profilenametostore=$filenamewithExtension.time().'.'.$filext;
            $request->file('profile_image')->storeAs('public/profile_images/',$profilenametostore);
            $image=Image::make('./storage/profile_images/'.$profilenametostore)->fit(260,260);
            $image->save();

        }

        if($request->hasFile("cv")){
            $cvnamewithExtension=$request->file('cv')->getClientOriginalName();
            $cvxt=$request->file('cv')->getClientOriginalExtension();
            $cvnamewithoutExtension=pathInfo($cvnamewithExtension,PATHINFO_FILENAME);
            $cvnametostore=$cvnamewithExtension.time().'.'.$cvxt;
            $request->file('cv')->storeAs('public/cvs/',$cvnametostore);

        }

        $datasored=\App\Profile::where('user_id',auth()->user()->id)->update([
            'industryInterest'=>$request->industryInterest,
            'profile_image'=>$profilenametostore,
            'cv'=>$cvnametostore,
            'user_id'=>auth()->user()->id,
        ]);


        event(new \App\Events\UserUpdatedProfileImageEvent($profilenametostore));
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AboutUser  $aboutUser
     * @return \Illuminate\Http\Response
     */
    public function show(AboutUser $aboutUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AboutUser  $aboutUser
     * @return \Illuminate\Http\Response
     */
    public function edit(AboutUser $aboutUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AboutUser  $aboutUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AboutUser $aboutUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AboutUser  $aboutUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(AboutUser $aboutUser)
    {
        //
    }
}
