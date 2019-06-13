@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
<br>
<div class="container">
    @if(isset($end_user))
    <table class="table table-striped">
        <thead>
            <tr>
                <th>User ID</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$end_user->id}}</td>
            </tr>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>items ID</th>
                        @foreach ($attributes as $attribute)
                        <th>{{$attribute->label}}</th>
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
                </tbody>
            </table>
        </tbody>
    </table>
    @endif

</div>
@include('layouts.footers.auth')
@endsection