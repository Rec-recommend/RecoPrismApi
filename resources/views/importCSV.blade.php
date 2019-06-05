@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    <div class="container">
        <div class="card bg-light mt-3">
            <div class="card-header">
                import your data
            </div>
            <div class="card-body">
                <form action="{{ route('items_web.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="csvfile" class="form-control">
                    <br>
                    <button class="btn btn-success">Import Csv file</button>
                </form>
            </div>
        </div>
    </div>


@endsection
