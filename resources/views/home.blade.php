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
                <strong>Name: </strong>{{$user->profile->first_name}} {{$user->profile->last_name}}
            </div>

            <div>
                <strong>Address: </strong> Random, Street 1
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
                    <strong>Email: </strong> john.doe@gmail.com
                </div>

                <div class="ps-2">
                    <strong>Phone: </strong> 0940 123 456
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

        <div class="col-4 rounded ms-3 mb-3" style="border: #000000 solid">
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
@endsection
