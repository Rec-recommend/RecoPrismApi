@extends('layouts.app', ['title' => __('Import CSV For Anonymizer')])

@section('content')
@include('users.partials.header', ['title' => __('Import CSV For Anonymizer')])

<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">{{ __('Import CSV For Anonymizer') }}</h3>
                            @if(Session::has('message'))
                            @if(Session::has('success'))
                            <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('message') }}</p>
                            @else
                            <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('message') }}</p>
                            @endif
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('anonymizer.anonyimze') }}" method="POST" enctype="multipart/form-data" name="csvForm">
                        @csrf
                        <input type="file" name="csvfile" class="form-control">
                        <input type="text" name="model" value='Item' class="form-control" hidden>
                        <br>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success mt-4">{{ __('Import') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footers.auth')
</div>
@endsection