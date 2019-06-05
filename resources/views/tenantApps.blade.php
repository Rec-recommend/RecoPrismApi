@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Website Name</th>
                                    <th scope="col">Delete Website</th>
                          
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($websites as $website)
                                <tr>
                                    <th scope="row">
                                        {{$website->fqdn}}
                                    </th>
                                    <td>
                                        <form id="delete-form" method="POST" action='{{ route('deleteApp',[$website->id])}}'> 
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <div class="form-group">
                                            <button type="submit" class="btn btn-danger"> DELETE </button>
                                            </div>
                                        </form>
                                            {{-- <input type="submit" class="btn btn-danger" href='{{ route('deleteApp') }}' value="DELETE">  --}}
                                    </td>
                                  
                                  
                                </tr>
                               
                              
                                @endforeach
                                   </tbody>
                        </table>
                  


        @include('layouts.footers.auth')
@endsection