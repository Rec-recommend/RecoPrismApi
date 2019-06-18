@extends('layouts.app', ['title' => __('Search For User Recommendations')])
@section('content')
@include('users.partials.header', ['title' => __('User Recommendations')])

<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">{{ __('Search For User Recommendations') }}</h3>
                            @if(Session::has('message'))
                            <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('message') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action='{{ route('search')}}' method="GET" role="search">
                        <div class="container">
                            <div class="row ">
                                <input type="number" min="1" class="form-control col-6" name="userID" placeholder="Search User ID">
                            </div>
                            <button type="submit" class="btn btn-success mt-4">{{ __('Search') }}</button>
                        </div>
                    </form>
                </div>
            </div>

            <br>
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0 url_endpoint"></h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <p class="url_response">{"items": [1240,1097,1291,1036,1387,1198,1200,2916,1136,1265]}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <script>
            s = window.location.hostname + "/api/recomendations/users/{id}"
            v = document.getElementsByClassName("url_endpoint")[0].innerHTML = s
        </script>
        @endsection