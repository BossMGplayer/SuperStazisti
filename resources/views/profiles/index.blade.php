@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-3 d-flex justify-content-center">
            <img src="https://img.freepik.com/free-photo/portrait-shirtless-young-man-isolated-grey-studio-background-caucasian-healthy-male-model-looking-side-posing-concept-men-s-health-beauty-self-care-body-skin-care_155003-33864.jpg?w=2000"
            style="height: 300px; width: 300px" class="rounded-circle">
        </div>

        <div class="pt-3">
            <div>
                <strong>Name: </strong> {{ $user->profile->full_name ?? 'N/A'}}
            </div>

            <div>
                <strong>Address: </strong> {{ $user->profile->address ?? 'N/A'}}
            </div>

            <div class="pt-3">
                <strong>Languages: </strong>

                <div class="ps-2">
                    <strong>English: </strong> Expert
                </div>

                <div class="ps-2">
                    <strong>German: </strong> Beginner
                </div>
            </div>

            <div class="pt-3">
                <strong>Contact: </strong>

                <div class="ps-2">
                    <strong>Email: </strong> {{ $user->profile->email ?? 'N/A'}}
                </div>

                <div class="ps-2">
                    <strong>Phone: </strong> {{ $user->profile->phone_number ?? 'N/A'}}
                </div>
            </div>
        </div>
    </div>

    <div class="row">
    @foreach($user->jobOffers as $jobOffer)
        <div class="card mt-3 me-3" style="width: 288px; height: 200px; border: 2px solid #e0e0e0 ">
            <div class="card-body rounded ms-3">
                <div>
                    {{ $jobOffer->job_title }}
                </div>
                <div>
                    {{ ucfirst(str_replace('_', ' ', $jobOffer->employment_type)) }}
                </div>
                <div>
                    {{ $jobOffer->address }}
                </div>
                <div>
                    {{ $jobOffer->pay }}eur/h
                </div>
            </div>
        </div>
    @endforeach
    </div>

@include('layouts.footer')
@endsection

