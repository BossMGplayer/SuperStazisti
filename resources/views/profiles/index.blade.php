@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-3 d-flex justify-content-center">
            <img src="https://img.freepik.com/free-photo/portrait-shirtless-young-man-isolated-grey-studio-background-caucasian-healthy-male-model-looking-side-posing-concept-men-s-health-beauty-self-care-body-skin-care_155003-33864.jpg?w=2000"
            style="height: 300px; width: 300px" class="rounded-circle">
        </div>

        <div class="pt-3">
            <div>
                <strong>Name: </strong> {{ $user->profile->full_name ?? 'N/A'}}
            </div>

            <div>
                <strong>Address: </strong> {{ $user->profile->address ?? 'N/A'}}
            </div>

            <div class="pt-3">
                <strong>Languages: </strong>

                <div class="ps-2">
                    <strong>English: </strong> Expert
                </div>

                <div class="ps-2">
                    <strong>German: </strong> Beginner
                </div>
            </div>

            <div class="pt-3">
                <strong>Contact: </strong>

                <div class="ps-2">
                    <strong>Email: </strong> {{ $user->profile->email ?? 'N/A'}}
                </div>

                <div class="ps-2">
                    <strong>Phone: </strong> {{ $user->profile->phone_number ?? 'N/A'}}
                </div>
            </div>
        </div>
    </div>

    <div class="row pt-5">
        <div class="col-4 rounded ms-3 mb-3" style="border: #000000 solid">
            <div>
                Upratovač
            </div>
            <div>
                Full-time
            </div>
            <div>
                Random, Street 1
            </div>
            <div>
                5eur/h
            </div>
        </div>

        <div class="col-4 rounded ms-3 mb-3" style="border: #000000 solid">
            <div>
                Programátor
            </div>
            <div>
                Full-time
            </div>
            <div>
                Random, Street 1
            </div>
            <div>
                8eur/h
            </div>
        </div>

        <div class="col-4 rounded ms-3 mb-5" style="border: #000000 solid">
            <div>
                Kuchar
            </div>
            <div>
                Full-time
            </div>
            <div>
                Random, Street 1
            </div>
            <div>
                6eur/h
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')
@endsection

