@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
<div class="table-responsive">
    <table class="table align-items-center table-dark">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Item ID</th>
            <th scope="col">Status</th>
        </tr>
        <tbody>
            @foreach ($items as $item)
        <tr>
            <th scope="row">
                {{$item->id}}
            </th>

            <td>
                <span class="badge badge-dot mr-4">
                  <i class="bg-warning"></i> 

                </span>
            </td>
        </tr>
        @endforeach
    </div>
</table>
                <div class="pagination">
                {{ $items->links() }}
                </div>









@include('layouts.footers.auth')
@endsection