<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CompanyController extends Controller
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
        $this->authorize('create',\App\Company::class);

        return view('loggedLayouts.register_a_company');
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
        $this->authorize('create',new \App\Company);

        $data=$request->validate([
            'company_name'=>'required|min:3',
            'company_industry'=>'required',
            'company_description'=>'required|min:2',
            'company_logo'=>'required|file|image'

        ]);

        if($request->hasFile("company_logo")){
            $company_logonamewithExtension=$request->file('company_logo')->getClientOriginalName();
            $company_logoxt=$request->file('company_logo')->getClientOriginalExtension();
            $company_logonamewithoutExtension=pathInfo($company_logonamewithExtension,PATHINFO_FILENAME);
            $company_logonametostore=$company_logonamewithoutExtension.time().'.'.$company_logoxt;

            $request->file('company_logo')->storeAs('public/company_logos/',$company_logonametostore);

        }
        $datanow=array_merge([
            'user_id'=>auth()->user()->id,
            'company_logo'=>$company_logonametostore,
        ],$data);

        $saved=\App\Company::create($datanow);
        $saved->update([
            'company_logo'=>$company_logonametostore

        ]);
        

        event(new \App\Events\newCompanyCreatedEvent($saved));
        session()->flash('company_created',"company_created successfully");

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('company.edit',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $company)
    {
        //
        if($request->hasFile('company_logo')){
            $validate=$request->validate([
                'company_name'=>'required|min:3',
                'company_Industry'=>'required',
                'company_description'=>'required|min:2',
                'company_logo'=>'required|file|image'

            ]);
            $company_logonamewithExtension=$request->file('company_logo')->getClientOriginalName();
            $company_logoxt=$request->file('company_logo')->getClientOriginalExtension();
            $company_logonamewithoutExtension=pathInfo($company_logonamewithExtension,PATHINFO_FILENAME);
            $company_logonametostore=$company_logonamewithoutExtension.time().'.'.$company_logoxt;
            $request->file('company_logo')->storeAs('public/company_logos/',$company_logonametostore);



            $saved=\App\Company::find($company);
            $saved->company_name=$request->company_name;
            $saved->company_Industry=$request->company_Industry;
            $saved->company_description	=$request->company_description	;
            $saved->company_logo=$company_logonametostore;
            $saved->user_id=auth()->user()->id;
            $saved->save();



            session()->flash('company_created',"company_created successfully");

            return redirect('/');


        }else{

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }
}
