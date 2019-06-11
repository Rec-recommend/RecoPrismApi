@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
<div class="container">
    <div style='padding:20px;'>
    <a type="button" class="btn btn-default" href='{{ route('createAttributes') }}' >CREATE ATTRIBUTES</a>
    </div>
                        <!-- Projects table -->
                    <table class="table align-items-center table-flush" style="padding:6px;">
                            <thead class="thead-light" >
                                <tr>
                                    <th  style="font-size:18px;" scope="col">Attributes Name</th>
                                    <th  style="font-size:18px;" scope="col">Attributes weight</th>
                                    <th  style="font-size:18px;" scope="col">Delete Attribute</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($attributes as $attribute)
                                <tr>
                                    <th  style="font-size:15px;" scope="row">
                                        {{$attribute->label}}
                                    </th>
                                    <th style="font-size:15px;" scope="row">
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
                  

                    </div>
        @include('layouts.footers.auth')
@endsection