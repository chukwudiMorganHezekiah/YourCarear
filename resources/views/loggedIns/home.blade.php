@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">


            <div class="card-body">

                    <div class="row">
                        <div class="col-lg-4">


                            <profileimage user="{{auth()->user()->id}}"></profileimage>

                        </div>

                        <div class="col-lg-8">
                        <form class="form-horizontal mt-4" enctype="multipart/form-data" method="post" action="{{ route('saveAboutUser') }}">
                                <div class="form-group">
                                    <label for="industryInterest">Which Industry is your interest Industry </label>
                                      <companyinterestlist name="industryInterest"></companyinterestlist>
                                      {{$errors->first("industryInterest")}}


                                </div>


                                <div class="form-group">
                                    <label for="profileimage">Profile Image </label>

                                    <input type="file" class="form-control" id="profile_image" name="profile_image" >
                                    {{$errors->first("profile_image")}}
                                </div>

                                <div class="form-group">
                                    <label for="cv">Upload Your CV</label>

                                    <input type="file" id ="cv" class="form-control" name="cv" >
                                    {{$errors->first("cv")}}

                                </div>
                                @csrf
                                <input type="submit" class="btn btn-primary btn-small" value="Save">

                            </form>

                        </div>


                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
