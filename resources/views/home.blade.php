@extends('layouts.app')

@section('content')
<div class="container is-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">My Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    <h1 class="text-center">Hello, {{ Auth::user()->username }}!</h1>

                    @switch(Auth::user()->account_type)

                        @case(1)
                            @include('interface.admin')
                        @break

                        @case(2)
                            @include('interface.employee')
                        @break

                        @case(3)
                            @include('interface.manager')
                        @break

                        @case(4)
                            @include('interface.stakeholder')
                        @break

                        @default
                            @include('interface.employee')
                        @break

                    @endswitch

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
