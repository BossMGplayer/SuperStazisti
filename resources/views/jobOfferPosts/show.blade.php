@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-12 card">
            <div>
                <div class="col-sm-12 col-md-12 col-lg-3 d-flex justify-content-center">
                    <img src="https://img.freepik.com/free-photo/portrait-shirtless-young-man-isolated-grey-studio-background-caucasian-healthy-male-model-looking-side-posing-concept-men-s-health-beauty-self-care-body-skin-care_155003-33864.jpg?w=2000"
                         style="height: 300px; width: 300px" class="rounded-circle">
                </div>

                <div class="ps-3">
                <div>
                    <h1>{{  $jobOfferPost->job_title }}</h1>
                </div>

                <div>
                    {{  $jobOfferPost->company_name ?? "No company"}}
                </div>

                <div>
                    Workplace type:
                    {{  ucfirst($jobOfferPost->workplace) }}
                </div>

                <div>
                    Job type:
                    {{  $jobOfferPost->employment_type }}
                </div>

                <div>
                    Address:
                    {{  $jobOfferPost->address }}
                </div>
                <div>
                    Pay:
                    {{  $jobOfferPost->pay }}eur/h
                </div>

                <div>
                    Description:
                    {{  $jobOfferPost->description }}
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection
