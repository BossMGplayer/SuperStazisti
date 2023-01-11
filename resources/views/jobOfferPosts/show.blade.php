@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-3 text-center">
                    <img src="https://img.freepik.com/free-photo/portrait-shirtless-young-man-isolated-grey-studio-background-caucasian-healthy-male-model-looking-side-posing-concept-men-s-health-beauty-self-care-body-skin-care_155003-33864.jpg?w=2000"
                         class="img-fluid rounded-circle" style="height: 250px; width: 250px">
                </div>
                <div class="col-sm-12 col-md-12 col-lg-9">
                    <div class="pt-3">
                        <h1>{{  $jobOfferPost->job_title }}</h1>
                    </div>
                    <div>
                        {{  $jobOfferPost->company_name ?? "No company"}}
                    </div>

                    <div>
                        <strong>Workplace type:</strong> {{ ucfirst($jobOfferPost->workplace) }}
                    </div>

                    <div>
                        <strong>Job type:</strong> {{ $jobOfferPost->employment_type }}
                    </div>
                    <div>
                        <strong>Address:</strong> {{ $jobOfferPost->address }}
                    </div>
                    <div>
                        <strong>Pay:</strong> {{ $jobOfferPost->pay }}eur/h
                    </div>

                    <div>
                        <strong>Description:</strong> {{ $jobOfferPost->description }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer')
@endsection
