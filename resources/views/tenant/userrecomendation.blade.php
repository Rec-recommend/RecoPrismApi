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
                <th>Recommended</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$end_user->id}}</td>
            </tr>
        </tbody>
    </table>
    @endif
    @if(!empty($nfMsg))
  <div class="alert alert-success"> {{ $nfMsg }}</div>
@endif
</div>








@include('layouts.footers.auth')
@endsection