
@extends('loggedLayouts.navbar')

@section('content')
<div class="container">
    <div class="row justify-content-center">
<div class="col-lg-12">
            <div class="card" style="position: relative;top:-50px;">


            <div class="card-body" >

                    <div class="row">
                        <div class="col-lg-10 offset-lg-1">
                            <table class="col-lg-12 table table-primary table-hover  table-responsive" >
                                <thead>
                                    <tr>
                                    <th>Name Of applicant</th>
                                    <th>Applicant Email</th>
                                    <th>Applicant Contact</th>
                                    <th>Cover Letter</th>
                                    <th>Download applicant CV</th>

                                    </tr>

                                </thead>

                                <tbody>
                                    @foreach ($applications as $application)
                                    <tr>

                                        <td>{{ $application->user->name }}</td>
                                        <td>{{ $application->user_email	 }}</td>
                                        <td>{{ $application->mobile_no }}</td>
                                        <td><coverletter letter="{{ $application->cover_letter }}"><p>Click to view</p></coverletter></td>
                                        <td><a href="/storage/cvs/{{ $application->cv }}" download="{{ $application->user->name }} " class="btn btn-primary">Download </a></td>
                                    </tr>

                                    @endforeach



                                </tbody>
                            </table>



                        </div>

                    </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
