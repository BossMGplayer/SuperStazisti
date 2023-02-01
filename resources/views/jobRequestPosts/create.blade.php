@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{route('jr.store')}}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="button-container" style="text-align: center;">
                <a href="/jo/create" class="btn btn-secondary mr-2" style="margin-right: 8px;">Job Offer</a>
                <a href="/jr/create" class="btn btn-primary" style="margin-left: 8px;">Job Request</a>
            </div>
            <hr style="width: 100%; height: 1px; background-color: #ccc; margin: 16px 0;">

            <div class="col-8 offset-2">
                <div class="row mb-3">
                    <label for="first_name" class="col-md-4 col-form-label text-md-end">First name</label>

                    <div class="col-md-6">
                        <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') ? old('first_name') : $user->profile->first_name }}" required autocomplete="first_name">

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
                        <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') ? old('last_name') : $user->profile->last_name }}" required autocomplete="last_name">

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
                        <input id="company_name" type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{ old('company_name') ? old('company_name') : $user->profile->company_name }}" autocomplete="company_name">

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
                        <input id="job_title" type="text" class="form-control @error('job_title') is-invalid @enderror" name="job_title" value="{{ old('job_title') ? old('job_title') : $user->profile->job_title }}" required autocomplete="job_title">

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
                        <input id="pay" type="number" class="form-control @error('pay') is-invalid @enderror" name="pay" value="{{ old('pay') ? old('pay') : $user->profile->pay }}" required autocomplete="pay">

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
                        <select id="employment_type" type="text" class="form-control @error('employment_type') is-invalid @enderror" name="employment_type" value="{{ old('employment_type') ? old('employment_type') : $user->profile->employment_type }}" required autocomplete="employment_type">
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
                        <select id="workplace" type="text" class="form-control @error('workplace') is-invalid @enderror" name="workplace" value="{{ old('workplace') ? old('workplace') : $user->profile->workplace }}" required autocomplete="workplace">
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
                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') ? old('address') : $user->profile->address }}" required autocomplete="address">

                        @error('address')
                        <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ? old('email') : $user->profile->email }}" required autocomplete="email">

                        @error('address')
                        <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="phone_number" class="col-md-4 col-form-label text-md-end">Phone number</label>

                    <div class="col-md-6">
                        <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') ? old('phone_number') : $user->profile->phone_number }}" required autocomplete="phone_number">

                        @error('phone_number')
                        <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="tags" class="col-md-4 col-form-label text-md-end">Tags</label>
                    <div class="col-md-6">
                        <select id="tags" name="tags[]" class="form-control @error('tags') is-invalid @enderror" multiple>
                            @foreach($tags as $tag)
                                <option value="{{$tag->id}}"
                                        @if(old('tags') && in_array($tag->id, old('tags')))
                                        selected
                                    @endif>
                                    {{$tag->name}}</option>
                            @endforeach
                        </select>

                        @error('tags')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="description" class="col-md-4 col-form-label text-md-end">Description</label>

                    <div class="col-md-6">
                        <textarea id="description" rows="8" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') ? old('description') : $user->profile->description }}" required autocomplete="description"></textarea>

                        @error('description')
                        <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                        @enderror
                    </div>

                    <div class="row pt-4">
                        <button class="btn btn-primary">Post job request</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
