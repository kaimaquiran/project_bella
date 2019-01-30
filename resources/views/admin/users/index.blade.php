@extends('layouts.app')

@section('content')
<div class="container is-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="/home" class="button is-default"><i class="fas fa-chevron-circle-left"></i>&nbsp;Back to dashboard</a></div>
                 <div class="card-body">
            		<h4>User List</h4>
                   
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Account Type</th>    
                            </tr>
                        </thead>
                        <tbody>
                            @if($users)
                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->account_type_name }}</td>
                                </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>

                    <button class="button is-primary float-right">Add User</button>

            	</div>
            </div>
        </div>
    </div>
</div>
@endsection