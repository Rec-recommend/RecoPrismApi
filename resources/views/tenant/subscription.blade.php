@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')


    <form method="post" action="{{ route('subscription.swap') }}" autocomplete="off">
                            @csrf
    <div class="form-group"  style="padding:10px;width:500px;">
                              <label class="btn btn-success" for="exampleFormControlSelect1">Selected Plan</label>
                              <select class="form-control" id="exampleFormControlSelect1" name="plan_id">
                                @foreach ($plans as $plan)
                              <option value={{$plan->stripe_plan}}> 
                                  {{$plan->name}} : {{$plan->cost}}$</option>
                                @endforeach
                              </select>

                              <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('SUBMIT') }}</button>
                                </div>   
                            </div>
                            
                                    
@include('layouts.footers.auth')
@endsection