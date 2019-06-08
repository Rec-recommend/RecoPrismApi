@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
        <div style='padding:20px;'>
        <a type="button" class="btn btn-default" href='{{ route('pkgcreate') }}' >CREATE New Package</a>
        </div>
        @if(session('success'))
        <div class="alert alert-success" role="alert">
            <h3>{{session('success')}}</h3>
        </div>
@endif
                            <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Package Name</th>
                                    <th scope="col">Package Price</th>
                                    <th scope="col">Package Description</th>
                                    <th scope="col">Delete Package</th>

                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($plans as $plan)
                                <tr>
                                    <th scope="row">
                                        {{$plan->name}}
                                    </th>
                                    <th scope="row">
                                      {{$plan->cost}} $
                                    </th>         
                                    <th scope="row">
                                      {{$plan->description}}
                                    </th> 
                                   <td>
                                        <form id="delete-form" method="POST" action='{{ route('pkgdestroy',[$plan->id])}}'> 
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <div class="form-group">
                                            <button type="submit" class="btn btn-danger"> DELETE </button>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
     @include('layouts.footers.auth')
@endsection