@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
<br>
<div class="container">
<form action='{{ route('search')}}' method="POST" role="search">
    {{ csrf_field() }}
    <div class="container">
    <div class="row ">
        <input type="number"  min="1" class="form-control col-6" name="userID" placeholder="Search User ID"> 
        <span class="input-group-btn">
            <button class="btn btn-icon btn-3 btn-default" type="submit">
	            <span class="btn-inner--icon"><i class="ni ni-bag-17"></i></span>
                <span class="btn-inner--text">SEARCH</span>
            </button>
        </span>
    </div>
    </div>
</form>
</div>
<br>

<div class="container">
<div class="table-responsive">
    <table class="table align-items-center ">
    <thead class="">
        <tr>
            <th scope="col">User ID</th>

        </tr>
        <tbody>

            @for ($i = 0 ; $i<count($end_users); $i++)
        <tr>
            <td scope="row">
                {{-- {{ dd($end_users[1]->id)}} --}}
                {{$end_users[$i]->id}}
            </td>

            <td scope="row">
                {{$end_users[++$i]->id}}
            </td>

            <td scope="row">
                {{$end_users[++$i]->id}}
            </td>
        </tr>
        @endfor
    </div>
</table>
</div>
                <div class="pagination">
                {{ $end_users->links() }}
                </div>




@include('layouts.footers.auth')
@endsection