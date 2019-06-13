@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
<br>
  
<div class="container">
    @if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('message') }}</p>
    @endif
<form action='{{ route('search')}}' method="GET" role="search">
    <div class="container">
    <div class="row ">
        <input type="number"  min="1" class="form-control col-6" name="userID" placeholder="Search User ID"> 
        <span class="input-group-btn">
            <button class="btn btn-icon btn-3 btn-default" type="submit">
	            <span class="btn-inner--icon"><i class="ni ni-bag-17"></i></span>
                <span class="btn-inner--text">SEARCH</span>
            </button>
        </span>
    </div>
    </div>
</form>
</div>
<br>
@include('layouts.footers.auth')
@endsection