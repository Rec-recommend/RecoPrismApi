@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
<div class="container">

    <div style='padding:20px;'>
    </div>
    <!-- Projects table -->
    <table class="table align-items-center table-flush">
        <thead class="thead-light">
            <tr>
                <th scope="col">Key Name</th>
                <th scope="col">Key Value</th>
                <th scope="col">Generate New Key</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($settings as $setting)
            <tr>
                <th scope="row">
                    {{$setting->key}}
                </th>
                <th scope="row">
                    {{$setting->value}}
                </th>
                <td>
                    <form id="update-form" method="POST" action='{{ route('setting.update',[$setting->id])}}'>
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <button type="submit" class="btn btn-danger"> Generate New {{$setting->key}}</button>
                        </div>
                    </form>
                </td>
            </tr>


            @endforeach
        </tbody>
    </table>

</div>

@include('layouts.footers.auth')
@endsection