@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="/profile/{{ $user->id }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')

            <div class="col-8 offset-2">
                <div class="row mb-3">
                    <label for="image" class="col-md-4 col-form-label text-md-end">Profile image</label>

                    <div class="col-md-6">
                        <input id="image" type="file" class="form-control" name="image">


                        @if($errors->has('image'))
                            <strong>{{ $errors->first('image') }}</strong>
                        @endif
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="first_name" class="col-md-4 col-form-label text-md-end">First name</label>

                    <div class="col-md-6">
                        <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') ?? $user->profile->first_name ?? 'N/A' }}" required autocomplete="first_name">

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
                        <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') ?? $user->profile->last_name ?? 'N/A'}}" required autocomplete="last_name">

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
                        <input id="company_name" type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{ old('company_name') ?? $user->profile->company_name ?? 'N/A'}}" autocomplete="company_name">

                        @error('company_name')
                        <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="address" class="col-md-4 col-form-label text-md-end">Address</label>

                    <div class="col-md-6">
                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') ?? $user->profile->address ?? 'N/A'}}" required autocomplete="address">

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
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ? old('email') : $user->email}}" required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="phone_number" class="col-md-4 col-form-label text-md-end">Phone</label>

                    <div class="col-md-6">
                        <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') ?? $user->profile->phone_number ?? 'N/A'}}" required autocomplete="phone_number">

                        @error('phone_number')
                        <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                        @enderror
                    </div>
                </div>

                    <div class="row pt-4">
                        <button class="btn btn-primary">Save changes</button>
                    </div>
                </div>
        </form>
    </div>

@endsection
