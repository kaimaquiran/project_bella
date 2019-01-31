<?php  

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use PMS\Task;
use PMS\Project;


//get tasks
$tasks = Task::where('task_progress',0)->get();

//get projects
$projects = Project::all();

?>



<div class="columns">
	<div class="column">
		<div class="card">
		  <header class="card-header">
		
		    <h4 class="card-header-title">
		      All Tasks &nbsp;
		
		    </h4>
		    <a href="#" class="card-header-icon" aria-label="more options">
		      <span class="icon">
		        <i class="fas fa-angle-down" aria-hidden="true"></i>
		      </span>
		    </a>
		  </header>
		  <div class="card-content">
		    <div class="content">
		     <h3>Active Tasks</h3>
		     	<ul style="list-style: none !important;">
		     		@if($tasks)
		     			@foreach($tasks as $task)
		     				
		     				<li style="{{ ($task->task_progress > 0) ? 'text-decoration: line-through;' : '' }}"> <a href="#" onclick="viewModal('{{ $task->task_name }}','{{ $task->task_description }}')">{{ $task->task_name }}</a> assigned to {{ $task->user->first_name }}  &nbsp;<span class="tag is-danger">{{ $task->project->project_name }}</span></li>
		     			@endforeach
		     		@endif
		     	</ul>
		
		
		      <br>
		      <!-- <small class="float-right" datetime="2016-1-1">Last updated by Sean at 11:09 PM - 1 Jan 2016</small> -->
		    </div>
		  </div>
			
		  <footer class="card-footer">
		  		<a href="/manage_task" class="button is-primary">Manage Tasks</a>
		  </footer>
		</div>

	</div>

	<div class="column">
		<div class="card">
		  <header class="card-header">
		
		    <h4 class="card-header-title">
		      All Projects &nbsp;
		
		    </h4>
		    <a href="#" class="card-header-icon" aria-label="more options">
		      <span class="icon">
		        <i class="fas fa-angle-down" aria-hidden="true"></i>
		      </span>
		    </a>
		  </header>
		  <div class="card-content">
		    <div class="content">
		     <h3>Active Projects</h3>
		     	
		     	<ul style="list-style: none !important;">
		     		@if($projects)
		     			@foreach($projects as $project)
		     				<li> <a href="#" onclick="viewModal('{{ $project->project_name }}','{{ $project->description }}')">{{ $project->project_name }}</a> &nbsp;<span class="tag is-primary" style="text-transform: uppercase;"><b>{{ $project->project_status }}</b></span></li>
		     			@endforeach
		     		@endif
		     	</ul>
		     	
		      <br>
		    </div>
		  </div>
			
		  <footer class="card-footer">
		  	<a href="/manage_project" class="button is-primary">Manage Projects</a>
		  </footer>
		</div>

	</div>


	<!-- MODAL -->
	<div class="modal" id="viewProjectModal">
	  <div class="modal-background"></div>
	  <div class="modal-card">
	    <header class="modal-card-head">
	      <p class="modal-card-title">Description</p>
	      <button class="delete" aria-label="close" onclick="javascript:closeModal();"></button>
	    </header>
	    <section class="modal-card-body">
	      <h1 class="modal_title_details">That Task Doe</h1>
	      <p class="modal_description">Your task description goes here</p>
	    </section>
	    <footer class="modal-card-foot">
	      <button onclick="javascript:closeModal();" class="button">Close</button>
	    </footer>
	  </div>
	</div>


</div>

<script type="text/javascript">
	
function viewModal(title, description)
{
	$('#viewProjectModal .modal_title_details').html(title);
	$('#viewProjectModal .modal_description').html(description);
	
	
	$('#viewProjectModal').addClass('is-active');
}

function closeModal()
{
	$('#viewProjectModal .modal_title_details').html('');
	$('#viewProjectModal .modal_description').html('');
	$('#viewProjectModal').removeClass('is-active');
}

</script>
