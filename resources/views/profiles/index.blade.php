@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-3 d-flex justify-content-center align-items-center">
                <img src="{{ $user->profile->profileImage() }}"
                     class="img-fluid rounded-circle mb-4" style="width: 250px; height: 250px">
            </div>

            <div class="col-sm-12 col-md-12 col-lg-9">
                @can('update', $user->profile)
                <div class="justify-content-end d-flex">
                    <a href="/profile/{{ $user->id }}/edit">Edit profile</a>
                </div>
                @endcan
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Personal Info</h4>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Name: </strong> {{ $user->profile->full_name ?? 'N/A'}}</p>
                                <p><strong>Company name: </strong> {{ $user->profile->company_name ?? 'N/A'}}</p>
                                <p><strong>Address: </strong> {{ $user->profile->address ?? 'N/A'}}</p>
                            </div>
                            <h4 class="card-title mt-4">Contact</h4>
                            <hr>
                            <div class="col-md-6">
                                <p><strong>Email: </strong> {{ $user->profile->email ?? 'N/A'}}</p>
                                <p><strong>Phone: </strong> {{ $user->profile->phone_number ?? 'N/A'}}</p>
                            </div>
                        </div>
                        <h4 class="card-title mt-4">Languages</h4>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>English: </strong> Expert</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>German: </strong> Beginner</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-6">
                <h3 class="mb-3">Job Offers</h3>
                <div class="card-deck">
                    @foreach($user->jobOffers as $jobOffer)
                        <a href="/jo/{{ $jobOffer->id }}" class="text-decoration-none link-dark">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $jobOffer->job_title }}</h5>
                                    <p class="card-text">{{ ucfirst(str_replace('_', ' ', $jobOffer->employment_type)) }}</p>
                                    <p class="card-text">{{ $jobOffer->address }}</p>
                                    <p class="card-text">{{ $jobOffer->pay }}eur/h</p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="col-6">
                <h3 class="mb-3">Job Requests</h3>
                <div class="card-deck">
                    @foreach($user->jobRequests as $jobRequest)
                    <a href="/jr/{{ $jobRequest->id }}" class="text-decoration-none link-dark">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title">{{ $jobRequest->job_title }}</h5>
                                <p class="card-text">{{ ucfirst(str_replace('_', ' ', $jobRequest->employment_type)) }}</p>
                                <p class="card-text">{{ $jobRequest->address }}</p>
                                <p class="card-text">{{ $jobRequest->pay }}eur/h</p>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    @include('layouts.footer')
@endsection
