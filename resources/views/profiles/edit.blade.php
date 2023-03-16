@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="ms-5">Profile settings</h1>
        <hr>
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
                        <button class="btn w-50 d-block d-lg-none m-auto btn-primary">Save changes</button>
                        <button class="btn w-25 d-none d-lg-block m-auto btn-primary">Save changes</button>
                    </div>
                </div>
        </form>

        <h1 class="ms-5 mt-5">Security settings</h1>
        <hr>
    @can('update', $user->profile)
        <div class="d-flex justify-content-between ps-5">
            <button type="button" class="btn btn-primary btn-xs ps-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Change Password
            </button>
        </div>
    @endcan

    <!-- Modal -->
    <div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Change Password</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('update-password') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @elseif (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif

                            <div class="mb-3">
                                <label for="oldPasswordInput" class="form-label">Old Password</label>
                                <input name="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" id="oldPasswordInput"
                                       placeholder="Old Password">
                                @error('old_password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="newPasswordInput" class="form-label">New Password</label>
                                <input name="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" id="newPasswordInput"
                                       placeholder="New Password">
                                @error('new_password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="confirmNewPasswordInput" class="form-label">Confirm New Password</label>
                                <input name="new_password_confirmation" type="password" class="form-control" id="confirmNewPasswordInput"
                                       placeholder="Confirm New Password">
                            </div>

                        </div>

                        <div class="card-footer">
                            <button class="btn btn-primary">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
