
@extends('layouts.app', ['title' => __('Plan Management')])

@section('content')
@include('users.partials.header', ['title' => __('Plan Management')])


<div class="container-fluid mt--7">
  <div class="row">
    <div class="col">
      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col-8">
              <h3 class="mb-0">{{ __('Plan') }}</h3>
            </div>
          </div>
        </div>

        <div class="col-12">
          @if (session('status'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif
        </div>

        <div class="card-body">        
          <form method="post" action="{{ route('subscription.swap') }}" autocomplete="off">
            @csrf
            <div class="form-group" style="padding:10px;width:500px;">
              <select class="form-control input-group mb-1" id="exampleFormControlSelect1" name="plan_id">
                @foreach ($plans as $plan)
                <option value={{$plan->stripe_plan}}>
                  {{$plan->name}} : {{$plan->cost}}$</option>
                @endforeach
              </select>
              <div class="text-center">
                <button type="submit" class="btn btn-success mt-4">{{ __('SUBMIT') }}</button>
              </div>
              @if($client->status == 1)
              <div>
                <a href="{{ route('subscription.unsubscribe')}}" class="btn btn-danger mt-4">{{ __('UNSUBSCRIBE') }}</a>
              </div>
              @else
              <div>
                <a href="{{ route('subscription.resume')}}" class="btn btn-success mt-4">{{ __('RESUME SUBSCRIPTION') }}</a>
              </div>
              @endif


            </div>
        </div>
      </div>
    </div>
  </div>

  @include('layouts.footers.auth')
</div>
@endsection