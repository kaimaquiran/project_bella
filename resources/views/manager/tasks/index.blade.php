@extends('layouts.app')

@section('content')
<div class="container is-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Manage Tasks</div>
                 <div class="card-body">
            		
                
                    <table class="table is-bordered">
                        <thead>
                            <th>Task Name</th>
                            <th>Assigned to</th>
                            <th>Project</th>
                            <th></th>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>

                    <button class="button is-primary float-right">Add Task</button>
            	</div>
            </div>
        </div>
    </div>
</div>
@endsection