@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    <div style='padding:20px;'>
    <a type="button" class="btn btn-default" href='{{ route('createApp') }}' >CREATE APP</a>
    </div>



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
                                        4,569
                                    </td>
                                  
                                  
                                </tr>
                               
                              
                                @endforeach
                                   </tbody>
                        </table>
                  


        @include('layouts.footers.auth')
@endsection