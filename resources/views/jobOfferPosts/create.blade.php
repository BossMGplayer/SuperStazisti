@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-8 offset-2">
        <div class="row mb-3">
            <label for="first_name" class="col-md-4 col-form-label text-md-end">{{ __('First name') }}</label>

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
            <label for="last_name" class="col-md-4 col-form-label text-md-end">{{ __('Last name') }}</label>

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
            <label for="company_name" class="col-md-4 col-form-label text-md-end">{{ __('Company') }}</label>

            <div class="col-md-6">
                <input id="company_name" type="text" class="form-control @error('company_name') is-invalid @enderror" name="first_name" value="{{ old('company_name') }}" required autocomplete="company_name">

                @error('company_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="job_title" class="col-md-4 col-form-label text-md-end">{{ __('Job') }}</label>

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
            <label for="pay" class="col-md-4 col-form-label text-md-end">{{ __('Pay') }}</label>

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
            <label for="employment_type" class="col-md-4 col-form-label text-md-end">{{ __('Employment Type') }}</label>

            <div class="col-md-6">
                <select id="employment_type" type="text" class="form-control @error('employment_type') is-invalid @enderror" name="employment_type" value="{{ old('employment_type') }}" required autocomplete="employment_type">
                    <option value="full time"></option>
                    <option value="part time"></option>
                    <option value="contract"></option>
                    <option value="temporary"></option>
                    <option value="volunteer"></option>
                    <option value="internship"></option>
                    <option value="other"></option>

                @error('employment_type')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="workplace" class="col-md-4 col-form-label text-md-end">{{ __('Workplace') }}</label>

            <div class="col-md-6">
                <select id="workplace" type="text" class="form-control @error('workplace') is-invalid @enderror" name="workplace" value="{{ old('workplace') }}" required autocomplete="workplace">
                    <option value="On-site"></option>
                    <option value="Hybrid"></option>
                    <option value="Remote"></option>

                @error('workplace')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="first_name" class="col-md-4 col-form-label text-md-end">{{ __('First name') }}</label>

            <div class="col-md-6">
                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name">

                @error('first_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')
@endsection

