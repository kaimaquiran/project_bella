@extends('layouts.app')

@section('content')
<div class="container is-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="/home" class="button is-default"><i class="fas fa-chevron-circle-left"></i>&nbsp;Back to dashboard</a></div>
                 <div class="card-body">
            		<h4>Create a new Task</h4>

                    <form method="POST" action="{{ route('task.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="task_name" class="col-md-4 col-form-label text-md-right">Task Name</label>

                            <div class="col-md-6">
                                <input id="task_name" type="text" class="form-control" name="task_name" value="" required autofocus>
                            </div>
                        </div>


                         <div class="form-group row">
                            <label for="task_description" class="col-md-4 col-form-label text-md-right">Task Description</label>

                            <div class="col-md-6">
                                <textarea class="form-control" name="task_description" id="task_description"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="project_id" class="col-md-4 col-form-label text-md-right">Project</label>

                            <div class="col-md-6">
                                <select name="project_id" id="project_id" class="form-control">
                                     @if($project)
                                        @foreach($project as $project)
                                            <option value="{{ $project->id }}">{{ $project->project_name }}</option>
                                        @endforeach
                                     @endif 
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="task_assigned_to" class="col-md-4 col-form-label text-md-right">Assigned To</label>

                            <div class="col-md-6">
                                <select name="task_assigned_to" id="task_assigned_to" class="form-control">
                                    @if($user)
                                        @foreach($user as $user)
                                            <option value="{{ $user->user_id }}">{{ $user->first_name }} {{ $user->last_name }}</option>
                                        @endforeach
                                    @endif 
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="task_priority" class="col-md-4 col-form-label text-md-right">Priority</label>

                            <div class="col-md-6">
                                <select name="task_priority" id="task_priority" class="form-control">
                                    <option value="1">High</option>
                                    <option value="2">Medium</option>
                                    <option value="3">Low</option>
                                </select>
                            </div>
                        </div>

                        <!-- <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right"></label>

                            <div class="col-md-6">
                               <input type="date" name="birthday" id="birthday" class="form-control">
                            </div>
                        </div> -->

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Add Task
                                </button>
                            </div>
                        </div>
                    </form> 


            	</div>
            </div>
        </div>
    </div>
</div>
@endsection