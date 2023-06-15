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

                @section('scripts')
                    <script>
                        // Store the checked state of checkboxes
                        function storeCheckboxState() {
                            console.log("first function")
                            const checkboxes = document.querySelectorAll('input[name="tags[]"]');
                            checkboxes.forEach((checkbox) => {
                                checkbox.dataset.checked = checkbox.checked;
                            });
                        }

                        // Call the function before filtering
                        storeCheckboxState();

                        // Restore the checked state of checkboxes
                        function restoreCheckboxState() {
                            console.log("second function")
                            const checkboxes = document.querySelectorAll('input[name="tags[]"]');
                            checkboxes.forEach((checkbox) => {
                                const checked = checkbox.dataset.checked === 'true';
                                checkbox.checked = checked;
                            });
                        }

                        // Call the function after filtering
                        restoreCheckboxState();
                    </script>
                @endsection

                <div class="p-2">
                    <form action="{{ route('home') }}" method="post">
                    @csrf
                    <!-- Tags -->
                        <ul class="col-md-6">
                            <li>
                                <label class="container">PHP
                                    <input type="checkbox" name="tags[]" value="PHP" data-id="php">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="container">Java
                                    <input type="checkbox" name="tags[]" value="Java" data-id="java">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="container">C++
                                    <input type="checkbox" name="tags[]" value="C++" data-id="c++">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="container">Vue
                                    <input type="checkbox" name="tags[]" value="Vue" data-id="vue">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="container">Python
                                    <input type="checkbox" name="tags[]" value="Python" data-id="python">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="container">Rust
                                    <input type="checkbox" name="tags[]" value="Rust" data-id="rust">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                        </ul>

                        <!-- Minimum Pay -->
                        <div class="form-group">
                            <label for="min_pay">Minimum Pay:</label>
                            <input type="number" class="form-control" id="min_pay" name="min_pay">
                        </div>

                        <!-- Maximum Pay -->
                        <div class="form-group">
                            <label for="max_pay">Maximum Pay:</label>
                            <input type="number" class="form-control" id="max_pay" name="max_pay">
                        </div>

                        <!-- Region -->
                        <div class="form-group">
                            <label for="region">Region:</label>
                            <select id="region" name="region" class="form-control">
                                <option value="all">-- All --</option>
                                <option value="bratislava">Bratislava</option>
                                <option value="kosice">Košice</option>
                                <option value="hurbanovo">Hurbanovo</option>
                                <option value="michalovce">Michalovce</option>
                                <option value="zilina">Žilina</option>
                            </select>
                        </div>

                        <!-- Employment Type -->
                        <div class="form-group">
                            <label for="employment_type">Employment Type:</label>
                            <select id="employment_type" name="employment_type" class="form-control">
                                <option value="all">-- All --</option>
                                <option value="full_time">Full time</option>
                                <option value="part_time">Part time</option>
                                <option value="contract">Contract</option>
                                <option value="temporary">Temporary</option>
                                <option value="volunteer">Volunteer</option>
                                <option value="internship">Internship</option>
                                <option value="other">Other</option>
                            </select>
                        </div>

                        <!-- Workplace -->
                        <div class="form-group">
                            <label for="workplace">Workplace:</label>
                            <select id="workplace" name="workplace" class="form-control">
                                <option value="all">-- All --</option>
                                <option value="on-site">On-site</option>
                                <option value="remote">Remote</option>
                                <option value="hybrid">Hybrid</option>
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
                    @foreach($jobPosts as $jobOffer)
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
