@extends('loggedLayouts.navbar')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">


            <div class="card-body">

                @if(session()->has("company_created"))
                <companycreatedalert></companycreatedalert>

                @endif

                    <div class="row">

                        <div class="col-lg-8">
                            <h3 class="text-secondary text-center">Available Jobs</h3>
                            @if($jobs->count() > 0)
                            @foreach($jobs as $job)


                            <div class="card p-3 mt-3 ">
                                <p class="text-center">Job Name:{{$job->job_title }}</p>
                                <p class="text-center">Job Description:{{$job->job_description }}</p>

                                <div class="card-footer">
                                    <div class="d-flex justify-content-center">

                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                            Apply Now
                                          </button>
                                    </div>


                                </div>




<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content" style="max-height: 550px;overflow-y:scroll">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Apply For Job</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>


        <div class="modal-body">
            <applymodal job_id="{{ $job->id }}" cv="{{ auth()->user()->profile->cv }}" user="{{ auth()->user()->id }}" email="{{ $job->company->user->email }}" jobindustry="{{ $job->job_Industry }}" jobtitle="{{ $job->job_title  }}" companyname="{{ $job->company->company_name }}" jobdescription="{{ $job->job_description }}"></applymodal>

        </div>
        <div class="modal-footer">
          <button type="button" id="application_toggler" class="btn btn-secondary" data-dismiss="modal">Close</button>

        </div>
      </div>
    </div>
  </div>

                            </div>



                            @endforeach

                            <div class="col-lg-12  d-flex mt-3 justify-content-center">{{ $jobs->links() }}</div>



                            @else

                            <div class="card"><p class="p-3"> No related Job</p></div>

                            @endif

                        </div>

                        <div class="col-lg-4">

         <h3 class="text-secondary text-center">Related Comapnies</h3>
                            @if($companies->count() > 0)

                            @foreach($companies as $company)
                            <div class="p-2 jumbotron  m-2 d-flex">
                                <img src="./storage/company_logos/{{ $company->company_logo }}" class="rounded-circle" style="width:30px;height:30px;">
                                <span class="ml-3">{{ $company->company_name }}</span>
                            </div>

                            @endforeach

                            @else

                            <div class="card"><p class="p-3"> No related Companies</p></div>

                            @endif


                        </div>

                    </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
