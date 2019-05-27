@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

<form action="{{route('storeApp')}}" method="post" style='padding:25px;' >
@csrf
<div class="row">
    <div class="col-md-6">
        <label style='font-size:15px;' class='btn btn-default'> Enter Subdomain </label>
      <div class="form-group">
        <input type="text" class="form-control" id="subdomain" name="subdomain" style="border-color:blue;" placeholder="subdomain.recoprism.com">
        <div style='padding:20px;margin-left:250px;'>
    <button type="submit" class="btn btn-default" >SUBMIT</button>
    </div>
      </div>
      @if (count($errors) > 0)
   <div style='font-size:16px;'class = "alert alert-danger">
         @foreach ($errors->all() as $error)
            {{ $error }}
         @endforeach
   </div>
@endif
    </div>
</div>
</form>
@include('layouts.footers.auth')
@endsection