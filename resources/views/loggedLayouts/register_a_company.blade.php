@extends('loggedLayouts.navbar')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="position: relative;top:-50px;">


            <div class="card-body" >

                    <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                            <form action="/company/store" method="post" class="form-horizontal" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="company_name"> Company Name </label>
                                     <input type="text" class="form-control" name="company_name" value="{{ old('company_name') }}" placeholder="Company Name" id="company_name">
                                     {{$errors->first("company_name")}}
                                    </div>

                                <div class="form-group">
                                    <label for="company_industry">Company Industry </label>
                                      <companyinterestlist name="company_industry" id="company_name"></companyinterestlist>
                                      {{$errors->first("company_industry")}}


                                </div>

                                <div class="form-group">
                                    <label for="company_description"> Company Description </label>
                                    <textarea name="company_description" cols="60" rows="5" value="{{ old('company_description') }}"></textarea>
                                    {{$errors->first("company_description")}}
                                </div>

                                <div class="form-group">
                                    <span class="">Company Logo</span>

                                    <input type="file" class="form-control" name="company_logo" id="company_logo">
                                    {{$errors->first("company_logo")}}
                                </div>
                                @csrf
                             <input type="submit" class="btn btn-primary" value="Submit Company">
                            </form>


                        </div>

                    </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
