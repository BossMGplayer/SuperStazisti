@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-3 text-center">
                    <a href="/profile/{{ $jobPost->user->id }}" class="text-decoration-none link-dark">
                        <img src="{{ $jobPost->user->profile->profileImage() }}"
                         class="img-fluid rounded-circle mb-4" style="width: 250px; height: 250px">
                    </a>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-9">
                    <div class="pt-3">
                        <h1>{{  $jobPost->job_title }}</h1>
                        {{ $jobPost->type }}
                    </div>

                    <div>
                        @if(sizeof($tagsArray) > 0)
                            <div class="d-flex">
                                @foreach ($tagsArray as $tag)
                                    <p>{{ $tag }}&nbsp</p>
                                @endforeach

                                @else
                                    <p></p>
                                @endif
                            </div>
                    </div>

                    <div>
                        <strong>Company:</strong> {{  $jobPost->company_name ?? "No company"}}
                    </div>

                    <div>
                        <strong>Workplace type:</strong> {{ ucfirst($jobPost->workplace) }}
                    </div>

                    <div>
                        <strong>Job type:</strong> {{ ucfirst(str_replace('_', ' ', $jobPost->employment_type ))}}
                    </div>
                    <div>
                        <strong>Address:</strong> {{ ucfirst($jobPost->region) }}, {{ $jobPost->address }}
                    </div>
                    <div>
                        <strong>Pay:</strong> {{ $jobPost->pay }}eur/h
                    </div>

                    <div>
                        <strong>Description:</strong> {{ $jobPost->description }}
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
                    <strong>Name:</strong> {{ $jobPost->user->profile->full_name }}
                </div>
                <div>
                    <strong>Phone number:</strong> {{  $jobPost->phone_number }}
                </div>

                <div>
                    <strong>Email:</strong> {{ $jobPost->email }}
                </div>
            </div>
        </div>
    @include('layouts.footer')
@endsection
