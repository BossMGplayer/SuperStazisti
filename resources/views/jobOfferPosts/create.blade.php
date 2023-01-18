@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{route('jo.store')}}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="col-8 offset-2">
                <div class="row mb-3">
                    <label for="first_name" class="col-md-4 col-form-label text-md-end">First name</label>

                    <div class="col-md-6">
                        <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name">

                        @error('first_name')
                        <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="last_name" class="col-md-4 col-form-label text-md-end">Last name</label>

                    <div class="col-md-6">
                        <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name">

                        @error('last_name')
                        <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="company_name" class="col-md-4 col-form-label text-md-end">Company</label>

                    <div class="col-md-6">
                        <input id="company_name" type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{ old('company_name') }}" autocomplete="company_name">

                        @error('company_name')
                        <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="job_title" class="col-md-4 col-form-label text-md-end">Job</label>

                    <div class="col-md-6">
                        <input id="job_title" type="text" class="form-control @error('job_title') is-invalid @enderror" name="job_title" value="{{ old('job_title') }}" required autocomplete="job_title">

                        @error('job_title')
                        <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="pay" class="col-md-4 col-form-label text-md-end">Pay</label>

                    <div class="col-md-6">
                        <input id="pay" type="number" class="form-control @error('pay') is-invalid @enderror" name="pay" value="{{ old('pay') }}" required autocomplete="pay">

                        @error('pay')
                        <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="employment_type" class="col-md-4 col-form-label text-md-end">Employment Type</label>

                    <div class="col-md-6">
                        <select id="employment_type" type="text" class="form-control @error('employment_type') is-invalid @enderror" name="employment_type" value="{{ old('employment_type') }}" required autocomplete="employment_type">
                            <option value="full_time">Full time</option>
                            <option value="part_time">Part time</option>
                            <option value="contract">Contract</option>
                            <option value="temporary">Temporary</option>
                            <option value="volunteer">Volunteer</option>
                            <option value="internship">Intership</option>
                            <option value="other">Other</option></select>

                        @error('employment_type')
                        <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="workplace" class="col-md-4 col-form-label text-md-end">Workplace</label>

                    <div class="col-md-6">
                        <select id="workplace" type="text" class="form-control @error('workplace') is-invalid @enderror" name="workplace" value="{{ old('workplace') }}" required autocomplete="workplace">
                            <option value="on-site">On-site</option>
                            <option value="hybrid">Hybrid</option>
                            <option value="remote">Remote</option>
                        </select>

                        @error('workplace')
                        <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="address" class="col-md-4 col-form-label text-md-end">Address</label>

                    <div class="col-md-6">
                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address">

                        @error('address')
                        <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="description" class="col-md-4 col-form-label text-md-end">Description</label>

                    <div class="col-md-6">
                        <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description">

                        @error('description')
                        <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                        @enderror
                    </div>

                    <div class="row pt-4">
                        <button class="btn btn-primary">Post job offer</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
