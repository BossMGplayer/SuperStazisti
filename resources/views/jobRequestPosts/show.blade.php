@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-3 text-center">
                    <img src="{{ $jobRequestPost->user->profile->profileImage() }}"
                         class="img-fluid rounded-circle mb-4" style="width: 250px; height: 250px">
                </div>
                <div class="col-sm-12 col-md-12 col-lg-9">
                    <div class="pt-3">
                        <h1>{{  $jobRequestPost->job_title }}</h1>
                    </div>
                    <div>
                        <strong>Company:</strong> {{  $jobRequestPost->company_name ?? "No company"}}
                    </div>

                    <div>
                        <strong>Workplace type:</strong> {{ ucfirst($jobRequestPost->workplace) }}
                    </div>

                    <div>
                        <strong>Job type:</strong> {{ $jobRequestPost->employment_type }}
                    </div>
                    <div>
                        <strong>Address:</strong> {{ $jobRequestPost->address }}
                    </div>
                    <div>
                        <strong>Pay:</strong> {{ $jobRequestPost->pay }}eur/h
                    </div>

                    <div>
                        <strong>Description:</strong> {{ $jobRequestPost->description }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer')
@endsection
