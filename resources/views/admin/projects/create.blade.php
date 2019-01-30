@extends('layouts.app')

@section('content')
<div class="container is-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="/home" class="button is-default"><i class="fas fa-chevron-circle-left"></i>&nbsp;Back to dashboard</a></div>
                 <div class="card-body">
            		<h4>Create a new Project</h4>

                    <form method="POST" action="{{ route('project.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="project_name" class="col-md-4 col-form-label text-md-right">Project Name</label>

                            <div class="col-md-6">
                                <input id="project_name" type="text" class="form-control" name="project_name" value="" required autofocus>
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Project Description</label>

                            <div class="col-md-6">
                                <textarea class="form-control" name="project_description" id="project_description"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Project Assigned To</label>

                            <div class="col-md-6">
                                <select name="project_assigned_to" id="project_assigned_to" class="form-control">
                                    @if($proj_managers)
                                        @foreach($proj_managers as $manager)
                                        <option value="{{ $manager->user_id }}">{{ $manager->first_name }} {{ $manager->last_name }}</option>
                                        @endforeach
                                    @endif
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
                                    Add Project
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