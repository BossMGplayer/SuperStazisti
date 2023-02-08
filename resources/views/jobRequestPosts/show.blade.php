@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-3 text-center">
                    <a href="/profile/{{ $jobRequestPost->user->id }}" class="text-decoration-none link-dark">
                        <img src="{{ $jobRequestPost->user->profile->profileImage() }}"
                         class="img-fluid rounded-circle mb-4" style="width: 250px; height: 250px">
                    </a>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-9">
                    <div class="pt-3">
                        <h1>{{  $jobRequestPost->job_title }}</h1>
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
                        <strong>Company:</strong> {{  $jobRequestPost->company_name ?? "No company"}}
                    </div>

                    <div>
                        <strong>Workplace type:</strong> {{ ucfirst($jobRequestPost->workplace) }}
                    </div>

                    <div>
                        <strong>Job type:</strong> {{ ucfirst(str_replace('_', ' ', $jobRequestPost->employment_type ))}}
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
        <div class="card mt-3 pb-3">
            <div class="col-sm-12 col-md-12 col-lg-9 ps-3">
                <div class="pt-3">
                    <h1>Contact:</h1>
                </div>
                <div>
                    <strong>Phone number:</strong> {{  $jobRequestPost->phone_number }}
                </div>

                <div>
                    <strong>Email:</strong> {{ $jobRequestPost->email }}
                </div>
            </div>
        </div>
    @include('layouts.footer')
@endsection
