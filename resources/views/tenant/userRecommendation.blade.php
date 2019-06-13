@extends('layouts.app', ['title' => __('Recommendations')])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('User Recommendatios Result') }}</h3>
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

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('items ID') }}</th>
                                    @foreach ($attributes as $attribute)
                                    <th scope="col">{{$attribute->label}}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach ($items as $item)
                                    <tr>
                                        <td>{{$item}}</td> 
                                        @foreach ($items_value as $key => $value)
                                            @if($value->item_id == $item)
                                                <td>{{$value->value}}</td> 
                                            @endif
                                        @endforeach
                                    </tr>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
            
        @include('layouts.footers.auth')
    </div>
@endsection