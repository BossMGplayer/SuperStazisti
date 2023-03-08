@extends('layouts.app')

@section('content')
    <body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2 p-0 bg-light">
                <div class="d-flex align-items-center p-3">
                    <h5 class="font-weight-bold m-0">Filters</h5>
                </div>
                <hr class="mt-0 mb-3">
                <div class="p-2">
                    <form action="{{ route('filterByTags', ['selectedTags' => []]) }}" method="post">
                        @csrf
                        <ul class="col-md-6">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="php" name="tags[]" value="php">
                                <label class="form-check-label" for="php">PHP</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="react" name="tags[]" value="react">
                                <label class="form-check-label" for="react">React</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="jquery" name="tags[]" value="jquery">
                                <label class="form-check-label" for="jquery">JQuery</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="javascript" name="tags[]" value="javascript">
                                <label class="form-check-label" for="javascript">Javascript</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="angular" name="tags[]" value="angular">
                                <label class="form-check-label" for="angular">Angular</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="vue" name="tags[]" value="vue">
                                <label class="form-check-label" for="vue">Vue</label>
                            </div>
                        </ul>

                        <div class="form-group">
                            <label for="min_pay">Minimum Pay:</label>
                            <input type="number" class="form-control" id="min_pay" name="min_pay">
                        </div>
                        <div class="form-group">
                            <label for="max_pay">Maximum Pay:</label>
                            <input type="number" class="form-control" id="max_pay" name="max_pay">
                        </div>

                        <br>

                        <div class="form-group">
                            Region
                            <select id="region" type="text" name="region" class="form-control @error('region') is-invalid @enderror" required autocomplete="region">
                                <option value="all">-- All --</option>
                                <option value="bratislava">Bratislava</option>
                                <option value="kosice">Košice</option>
                                <option value="hurbanovo">Hurbanovo</option>
                                <option value="banska_bystrica">Banská Bystrica</option>
                                <option value="michalovce">Michalovce</option>
                                <option value="zilina">Žilina</option>
                                <option value="nitra">Nitra</option>
                            </select>
                        </div>

                        @error('region')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <br>

                        <div class="form-group">
                            Employment type
                            <select id="employment_type" type="text" name="employment_type" class="form-control @error('employment_type') is-invalid @enderror" required autocomplete="employment_type">
                                <option value="all">-- All --</option>
                                <option value="full_time">Full time</option>
                                <option value="part_time">Part time</option>
                                <option value="contract">Contract</option>
                                <option value="temporary">Temporary</option>
                                <option value="volunteer">Volunteer</option>
                                <option value="internship">Intership</option>
                                <option value="other">Other</option>
                            </select>
                        </div>

                        @error('employment_type')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <br>

                        <div class="form-group">
                            Workplace
                            <select id="workplace" type="text" name="workplace" class="form-control @error('workplace') is-invalid @enderror" required autocomplete="workplace">
                                <option value="all">-- All --</option>
                                <option value="on-site">On-site</option>
                                <option value="hybrid">Hybrid</option>
                                <option value="remote">Remote</option>
                            </select>
                        </div>

                        @error('workplace')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <br>
                        <input type="hidden" name="selected_tags">
                        <button type="submit" class="btn btn-primary ms-3">Filter</button>
                    </form>
                </div>
            </div>

            <div class="col-5 p-0">
                <div class="d-flex align-items-center p-3">
                    <h5 class="font-weight-bold m-0">Job requests</h5>
                </div>
                <hr class="mt-0 mb-3">
                <div class="p-3">
                    @foreach(\App\Models\JobPost::all() as $jobRequest)
                        @if ($jobRequest->type == 'request')
                            <a href="/post/{{ $jobRequest->id }}" class="text-decoration-none link-dark">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $jobRequest->job_title }}</h5>
                                        <hr>
                                        <p class="card-text">{{ ucfirst(str_replace('_', ' ', $jobRequest->employment_type ))}}</p>
                                        <p class="card-text">{{ ucfirst($jobRequest->region)}}, {{ $jobRequest->address }}</p>
                                        <p class="card-text">{{ $jobRequest->pay }}eur/h</p>
                                    </div>
                                </div>
                            </a>
                        @endif
                    @endforeach

                </div>
            </div>

            <div class="col-5 p-0">
                <div class="d-flex align-items-center p-3">
                    <h5 class="font-weight-bold m-0">Job offers</h5>
                </div>
                <hr class="mt-0 mb-3">
                <div class="p-3">
                    @foreach(\App\Models\JobPost::all() as $jobOffer)
                        @if ($jobOffer->type == 'offer')
                            <a href="/post/{{ $jobOffer->id }}" class="text-decoration-none link-dark">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $jobOffer->job_title }}</h5>
                                        <hr>
                                        <p class="card-text">{{ ucfirst(str_replace('_', ' ', $jobOffer->employment_type ))}}</p>
                                        <p class="card-text">{{ ucfirst($jobOffer->region)}}, {{ $jobOffer->address }}</p>
                                        <p class="card-text">{{ $jobOffer->pay }}eur/h</p>
                                    </div>
                                </div>
                            </a>
                        @endif
                    @endforeach

                </div>
            </div>
        </div>

    </div>
    </body>
    @include('layouts.footer')
@endsection
