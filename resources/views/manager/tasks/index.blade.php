@extends('layouts.app')

@section('content')
<div class="container is-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                 <div class="card-header"><a href="/home" class="button is-default"><i class="fas fa-chevron-circle-left"></i>&nbsp;Back to dashboard</a></div>
                 <div class="card-body">
            		<h4>Manage Tasks</h4>
                    <table class="table is-bordered">
                        <thead>
                            <th>Task Name</th>
                            <th>Description</th>
                            <th>Project</th>
                            <th></th>
                        </thead>
                        <tbody>
                        @if($task)
                            @foreach($task as $task)
                                <tr>
                                    <td>{{ $task->task_name }}</td>
                                    <td>{{ $task->description }}</td>
                                    <td>{{ $task->project_id }}</td>
                                    <td></td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>

                    <a href="{{ route('create_task') }}" class="button is-primary float-right">Add Task</a>
            	</div>
            </div>
        </div>
    </div>
</div>
@endsection