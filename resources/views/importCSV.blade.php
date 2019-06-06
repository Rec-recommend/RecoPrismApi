@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    <div class="container">
        <div class="card bg-light mt-3">
            <div class="card-header">
                Import your data
            </div>
            @if(Session::has('message'))
                @if(Session::has('success'))
                    <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('message') }}</p>
                @else
                    <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('message') }}</p>
                @endif
            @endif
            <div class="card-body">
                <form action="{{ route('csv.store') }}" method="POST" enctype="multipart/form-data" name="csvForm">
                    @csrf
                    <select onChange="document.forms.csvForm.model.value = this.value" class="form-control input-group mb-1" >
                            <option value="Item">items</option>
                            <option value="User">users</option>
                            <option value="Rating">ratings</option>
                            <option value="Purchase">Purchases</option>
                    </select>
                    <input type="file" name="csvfile" class="form-control">
                    <input type="text" name="model" value='Item' class="form-control" hidden>
                    <br>
                    <button class="btn btn-success">Import Csv file</button>
                </form>
            </div>
        </div>
    </div>


@endsection
