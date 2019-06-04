@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    <div style='padding:20px;'>
    <a type="button" class="btn btn-default" href='{{ route('createAttributes') }}' >CREATE ATTRIBUTES</a>
    </div>
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Attributes Name</th>
                                    <th scope="col">Attributes weight</th>
                                    <th scope="col">Delete Attribute</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($attributes as $attribute)
                                <tr>
                                    <th scope="row">
                                        {{$attribute->label}}
                                    </th>
                                    <th scope="row">
                                      {{$attribute->weight}}
                                  </th>
                                    <td>
                                        <form id="delete-form" method="POST" action='{{ route('deleteAttribute',[$attribute->id])}}'> 
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