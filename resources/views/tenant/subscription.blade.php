@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')


    <form method="post" action="{{ route('subscription.swap') }}" autocomplete="off">
                            @csrf
    <div class="form-group"  style="padding:10px;width:500px;">
                              <label class="btn btn-success" for="exampleFormControlSelect1">Change Selected Plan</label>
                              <select class="form-control" id="exampleFormControlSelect1" name="plan_id">
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
                                     
@include('layouts.footers.auth')
@endsection