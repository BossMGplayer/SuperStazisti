@extends('layouts.app')

@section('content')
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

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
                            @can('update', $user->profile)
                            <button type="button" class="btn btn-primary btn-xs" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Add language
                            </button>
                            @endcan
                        </div>

                            <!-- Modal -->
                            <div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Add new Language</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('lang.store')}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                            <select id="language" type="text" class="form-control @error('language') is-invalid @enderror" name="language" value="{{ old('language') }}" required autocomplete="language">
                                                <option value="albanian">Albanian</option>
                                                <option value="arabic">Arabic</option>
                                                <option value="armenian">Armenian</option>
                                                <option value="basque">Basque</option>
                                                <option value="bengali">Bengali</option>
                                                <option value="bulgarian">Bulgarian</option>
                                                <option value="catalan">Catalan</option>
                                                <option value="czech">Czech</option>
                                                <option value="chinese_simplified">Chinese (Simplified)</option>
                                                <option value="chinese_traditional">Chinese (Traditional)</option>
                                                <option value="croatian">Croatian</option>
                                                <option value="danish">Danish</option>
                                                <option value="dutch">Dutch</option>
                                                <option value="english">English</option>
                                                <option value="esperanto">Esperanto</option>
                                                <option value="estonian">Estonian</option>
                                                <option value="finnish">Finnish</option>
                                                <option value="french">French</option>
                                                <option value="galician">Galician</option>
                                                <option value="german">German</option>
                                                <option value="greek">Greek</option>
                                                <option value="gujarati">Gujarati</option>
                                                <option value="hindi">Hindi</option>
                                                <option value="hungarian">Hungarian</option>
                                                <option value="icelandic">Icelandic</option>
                                                <option value="indonesian">Indonesian</option>
                                                <option value="irish">Irish</option>
                                                <option value="italian">Italian</option>
                                                <option value="japanese">Japanese</option>
                                                <option value="kannada">Kannada</option>
                                                <option value="kazakh">Kazakh</option>
                                                <option value="korean">Korean</option>
                                                <option value="latvian">Latvian</option>
                                                <option value="lithuanian">Lithuanian</option>
                                                <option value="macedonian">Macedonian</option>
                                                <option value="malayalam">Malayalam</option>
                                                <option value="marathi">Marathi</option>
                                                <option value="norwegian">Norwegian</option>
                                                <option value="oriya">Oriya</option>
                                                <option value="polish">Polish</option>
                                                <option value="portuguese">Portuguese</option>
                                                <option value="punjabi">Punjabi</option>
                                                <option value="romanian">Romanian</option>
                                                <option value="russian">Russian</option>
                                                <option value="sanskrit">Sanskrit</option>
                                                <option value="serbian">Serbian</option>
                                                <option value="slovak">Slovak</option>
                                                <option value="slovenian">Slovenian</option>
                                                <option value="somali">Somali</option>
                                                <option value="spanish">Spanish</option>
                                                <option value="swahili">Swahili</option>
                                                <option value="swedish">Swedish</option>
                                            </select>

                                            @error('employment_type')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror

                                            <select id="skill" type="text" class="form-control mt-2 @error('skill') is-invalid @enderror" name="skill" value="{{ old('skill') }}" required autocomplete="skill">>
                                                <option value="beginner">Beginner</option>
                                                <option value="intermediate">Intermediate</option>
                                                <option value="expert">Expert</option>
                                                <option value="fluent">Fluent</option>
                                                <option value="native">Native</option>
                                                <option value="proficient">Proficient</option>
                                            </select>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Add language</button>
                                        </div>
                                            </form>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        <hr>
                        <div class="row">
                            @if($user->languages->count() > 0)
                                @foreach($user->languages as $language)
                                    <form action="{{ route('lang.delete', $language->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="d-flex text-decoration-none text-dark">
                                            <strong>{{ ucfirst($language->language) }}</strong>&nbsp;<p>{{ ucfirst($language->skill) }}</p>
                                        </button>
                                    </form>

                                    </div>
                                @endforeach
                            @else
                                <p>No languages.</p>
                            @endif
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
                <div id="toastr-container"></div>
            </div>
        </div>
    </div>
    @include('layouts.footer')
@endsection
