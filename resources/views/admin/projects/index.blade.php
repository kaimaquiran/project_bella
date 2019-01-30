@extends('layouts.app')

@section('content')
<div class="container is-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                 <div class="card-header"><a href="/home" class="button is-default"><i class="fas fa-chevron-circle-left"></i>&nbsp;Back to dashboard</a></div>
                 <div class="card-body">
            		
                    <h4>Manage Projects</h4>
                    <table class="table is-bordered">
                        <thead>
                            <th>Project Name</th>
                            <th>Description</th>
                            <th>Assigned To</th>
                            <th></th>
                        </thead>
                        <tbody>
                            @if($projects)
                                @foreach($projects as $project)
                                <tr>
                                    <td>{{ $project->project_name }}</td>
                                    <td>{{ $project->description }}</td>
                                    <td>{{ $project->project_assigned_to }}</td>
                                    <td></td>
                                </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>

                    <a href="{{ route('create_project') }}" class="button is-primary float-right">Add Project</a>
            	</div>
            </div>
        </div>
    </div>
</div>
@endsection