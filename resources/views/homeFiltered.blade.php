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

                        <div class="form-group">
                            <label for="all-regions">
                                <input type="checkbox" id="all-regions" name="all-regions" value="all-regions"> All Regions
                            </label>
                        </div>
                        <br>
                        <div class="form-group">
                            <select id="region" type="text" name="region" required autocomplete="region">>
                                <option value="bratislava">Bratislava</option>
                                <option value="kosice">Košice</option>
                                <option value="hurbanovo">Hurbanovo</option>
                                <option value="banska_bystrica">Banská Bystrica</option>
                                <option value="michalovce">Michalovce</option>
                                <option value="zilina">Žilina</option>
                                <option value="nitra">Nitra</option>
                            </select>
                        </div>

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
                    @foreach($jobRequestPosts as $jobRequest)
                        <a href="/jr/{{ $jobRequest->id }}" class="text-decoration-none link-dark">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $jobRequest->job_title }}</h5>
                                    <hr>
                                    <p class="card-text">{{ ucfirst(str_replace('_', ' ', $jobRequest->employment_type ))}}</p>
                                    <p class="card-text">{{ $jobRequest->address }}</p>
                                    <p class="card-text">{{ $jobRequest->pay }}eur/h</p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="col-5 p-0">
                <div class="d-flex align-items-center p-3">
                    <h5 class="font-weight-bold m-0">Job offers</h5>
                </div>
                <hr class="mt-0 mb-3">
                <div class="p-3">
                    @foreach($jobOfferPosts as $jobOffer)
                        <a href="/jo/{{ $jobOffer->id }}" class="text-decoration-none link-dark">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $jobOffer->job_title }}</h5>
                                    <hr>
                                    <p class="card-text">{{ ucfirst(str_replace('_', ' ', $jobOffer->employment_type ))}}</p>
                                    <p class="card-text">{{ $jobOffer->address }}</p>
                                    <p class="card-text">{{ $jobOffer->pay }}eur/h</p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
    </body>
    @include('layouts.footer')
@endsection
