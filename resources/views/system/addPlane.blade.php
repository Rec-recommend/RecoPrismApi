@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
<br>
<div class="container">
<form method="POST" action="{{route('pkgstore')}}" id="form">
  @csrf
  <div class="form-horizontal">
    <div class="form-body">
      <div class="form-group">
        @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            {{ $errors->first('name')}}
            {{ $errors->first('cost')}}
            {{ $errors->first('description')}}
            {{ $errors->first('stripe_plan')}}

          </div>
        @endif
        @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
        
        <div class="form-group row">
            <label for="titleid" class="col-sm-3 col-form-label">Package Name</label>
            <div class="col-sm-9">
                <input name="package name" type="text" class="form-control" id="titleid" placeholder="Package Name">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Package Price</label>
            <div class="col-sm-9">
                <input name="package price" type="number" min="0" class="form-control" id="pckgprice" placeholder="Package Price">
            </div>
        </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Package Description</label>
            <div class="col-sm-9">
                <textarea name="package description" type="text" class="form-control" id="pckgprice" placeholder="Package Description" rows="3" style="resize: none;"></textarea>
            </div>
        </div>
                <div class="form-group row">
            <label class="col-sm-3 col-form-label">Stripe Plan ID </label>
            <div class="col-sm-9">
                <input name="stripe_plan" type="text" class="form-control" id="pckgprice" placeholder="Stripe Plan ID ">
            </div>
        </div>
        
        <div class="form-actions right">
            <div class="row">
        <div class="col-md-offset-3 col-md-9">
          <button type="submit" class="btn btn-primary next-step">Submit</button>
        </div>
      </div>
    </div>
  </div>
</form>

</div>
@include('layouts.footers.auth')
@endsection