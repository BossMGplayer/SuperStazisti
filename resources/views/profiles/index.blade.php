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

                        <div class="d-flex justify-content-between">
                            <h4 class="card-title mt-4">Languages</h4>
                            <button type="button" class="btn btn-primary btn-xs" id="languageModalBtn">Add language</button>
                        </div>

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
                                <p class="card-text">{{ ucfirst(str_replace('_', ' ', $jobRequest->employment_type ))}}</p>
                                <p class="card-text">{{ $jobRequest->address }}</p>
                                <p class="card-text">{{ $jobRequest->pay }}eur/h</p>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>

        <div id="myModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <div class="modal-header">
                    <span class="close">&times;</span>
                    <h2>Modal Header</h2>
                </div>
                <div class="modal-body">
                    <p>Some text in the Modal Body</p>
                    <p>Some other text...</p>
                </div>
                <div class="modal-footer">
                    <h3>Modal Footer</h3>
                </div>
            </div>

        </div>

        <script>
            // Get the modal
            const modal = document.getElementById("myModal");

            // Get the button that opens the modal
            let btn = document.getElementById("languageModalBtn");

            // Get the <span> element that closes the modal
            const span = document.getElementsByClassName("close")[0];

            // When the user clicks the button, open the modal
            btn.onclick = function() {
                modal.style.display = "block";
                console.log("button clicked")
            }

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
                modal.style.display = "none";
            }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        </script>




    @include('layouts.footer')
@endsection
