@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-3 text-center">
                    <img src="{{ $jobOfferPost->user->profile->profileImage() }}"
                         class="img-fluid rounded-circle mb-4" style="width: 250px; height: 250px">
                </div>
                <div class="col-sm-12 col-md-12 col-lg-9">
                    <div class="pt-3">
                        <h1>{{  $jobOfferPost->job_title }}</h1>
                    </div>
                    <div>
                        <strong>Company:</strong> {{  $jobOfferPost->company_name ?? "No company"}}
                    </div>

                    <div>
                        <strong>Workplace type:</strong> {{ ucfirst($jobOfferPost->workplace) }}
                    </div>

                    <div>
                        <strong>Job type:</strong> {{ ucfirst(str_replace('_', ' ', $jobOfferPost->employment_type ))}}
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

        <div class="card mt-3 pb-3">
            <div class="col-sm-12 col-md-12 col-lg-9 ps-3">
                <div class="pt-3">
                    <h1>Contact:</h1>
                </div>
                <div>
                    <strong>Phone number:</strong> {{  $jobOfferPost->phone_number }}
                </div>

                <div>
                    <strong>Email:</strong> {{ $jobOfferPost->email }}
                </div>
        </div>
    </div>
    @include('layouts.footer')
@endsection
