@extends('layouts.app', ['title' => __('Package Management')])

@section('content')
    @include('users.partials.header', ['title' => __('Add Package')])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Package Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('pkgshow') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
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
                                  <div class="form-group row">
                                      <label for="titleid" class="col-sm-3 col-form-label">Package Limits</label>
                                      <div class="col-sm-9">
                                          <input name="package total_req"  type="number" min="0" class="form-control" id="total_req" placeholder="Package Limits">
                                      </div>
                                  </div>
                                  </div>
                                  <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">Package Description</label>
                                      <div class="col-sm-9">
                                          <textarea name="package description" type="text" class="form-control" id="pckgprice" placeholder="Package Description" rows="3" style="resize: none;"></textarea>
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
                </div>
            </div>
        </div>
        
    </div>
    @include('layouts.footers.auth')
@endsection