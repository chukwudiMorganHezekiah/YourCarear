@extends('loggedLayouts.navbar')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="position: relative;top:-50px;">


            <div class="card-body" >

                    <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                            <form action="/job/store" method="post" class="form-horizontal" >
                                <div class="form-group">
                                    <label for="job_title"> Job Name</label>
                                     <input type="text" class="form-control" name="job_title" value="{{ old('job_title') }}" placeholder="Company Name" id="job_title">
                                     {{$errors->first("job_title")}}
                                    </div>

                                <div class="form-group">
                                    <label for="job_Industry">Job Industry </label>
                                      <companyinterestlist name="job_Industry" id="job_Industry"></companyinterestlist>
                                      {{$errors->first("job_Industry")}}


                                </div>

                                <div class="form-group">
                                    <label for="job_description"> Job Description </label>
                                    <textarea name="job_description" cols="60" rows="5" value="{{ old('job_description') }}"></textarea>
                                    {{$errors->first("job_description")}}
                                </div>


                                @csrf
                             <input type="submit" class="btn btn-primary" value="Submit Job">
                            </form>


                        </div>

                    </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
