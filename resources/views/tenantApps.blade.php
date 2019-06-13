@extends('layouts.app', ['title' => __('Tenants Management')])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Tenants') }}</h3>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('Website Name') }}</th>
                                    <th scope="col">{{ __('Maintenance Mode') }}</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($hostnames as $hostname)
                                    <tr>
                                        <td>{{$hostname->fqdn}}</td>
                                        <td>
                                            
                                            <form id="suspend-form" method="POST" action='{{route('toggleApp',[$hostname->id])}}'>
                                                {{ csrf_field() }}
                                                @if(!$hostname->under_maintenance_since)
                                                <label class="custom-toggle">
                                                    <input type="checkbox" onChange="this.form.submit()">
                                                    <span class="custom-toggle-slider rounded-circle"></span>
                                                </label>
                                                @else
                                                <label class="custom-toggle">
                                                    <input type="checkbox" onChange="this.form.submit()" checked>
                                                    <span class="custom-toggle-slider rounded-circle"></span>
                                                </label>
                                                @endif
                                            </form>
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                        <form action="{{ route('deleteApp',[$hostname->id])}}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            
                                                            <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this Tenant?") }}') ? this.parentElement.submit() : ''">
                                                                {{ __('Delete') }}
                                                            </button>
                                                        </form>    
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                        </nav>
                    </div>
                </div>
            </div>
        </div>
            
        @include('layouts.footers.auth')
    </div>
@endsection