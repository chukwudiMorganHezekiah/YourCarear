
@extends('loggedLayouts.navbar')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="position: relative;top:-50px;">


            <div class="card-body" >

                    <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                            <table class="table table-hover table-striped table-responsive">
                                <thead>
                                    <tr>
                                    <th>Job Name</th>
                                    <th>Number Of applications</th>
                                    <th>Job Name</th>

                                    </tr>

                                </thead>
                                <tbody>

                            @foreach($jobs as $job)

                            <tr>
                                <td>
                                    <a href="#"> {{ $job->job_title }}</a>

                                </td>
                                <td>
                                    <p class="ml-5">{{ \App\Application::where('job_id',$job->id)->count() }}</p>

                                </td>

                                <td>
                                    <a href="edit/{{ $job->id }}-{{ str_random(40) }}/job" class="ml-5 btn btn-primary">View</a>


                                </td>

                            </tr>



                            @endforeach

                                </tbody>
                        </table>
                        <div class="d-fle justify-content-center">
                            {{ $jobs->links() }}

                        </div>



                        </div>

                    </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
