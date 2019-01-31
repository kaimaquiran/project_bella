<h4>My Current Tasks</h4>

<?php  

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use PMS\Task;

//get tasks

$tasks = Task::where('task_assigned_to',auth()->user()->id)->get();


?>
<div class="columns">



	<div class="column">
		<div class="card">
		  <header class="card-header">
		
		    <h4 class="card-header-title">
		      Task &nbsp;
		
		    </h4>
		    <a href="#" class="card-header-icon" aria-label="more options">
		      <span class="icon">
		        <i class="fas fa-angle-down" aria-hidden="true"></i>
		      </span>
		    </a>
		  </header>
		  <div class="card-content">
		    <div class="content">
		     <h3>Tasks</h3>
		     	<ul class="task_list" style="list-style: none !important;">
		     		@if($tasks)
		     			@foreach($tasks as $task)
		     			<?php switch ($task->task_priority) {
		     				case 1:
		     				$tag_color = 'is-danger';
		     				$priority_text = "High";
		     				break;

		     				case 2:
		     				$tag_color = 'is-warning';
		     				$priority_text = "Medium";
		     				break;

		     				case 3:
		     				$tag_color = 'is-default';
		     				$priority_text = "Low";
		     				break;
		     				
		     				default:
		     				$tag_color = 'is-default';
		     				$priority_text = "Normal";
		     				break;
		     			} ?>

		     			<form method="POST" action="/home/{{ $task->id }}">
		     			@csrf
		     			@method('PATCH')
		     			<li style="{{ ($task->task_progress > 0) ? 'text-decoration: line-through;' : '' }}"><input type="checkbox" name="completed" onchange="this.form.submit();" {{ ($task->task_progress > 0) ? 'checked' : '' }}> <span class="tag is-primary">{{ $task->project->project_name }}</span> <span class="tag {{ $tag_color }}">  {{ $priority_text }} Priority</span>&nbsp;<a href="#" onclick="viewModal('{{$task->task_name}}','{{ $task->description }}')">{{ $task->task_name }}</a> &nbsp;</li>
		     			</form>
		     			@endforeach
		     		@endif
		     	</ul>
		
		
		      <br>
		      <!-- <small class="float-right" datetime="2016-1-1">Last updated by Sean at 11:09 PM - 1 Jan 2016</small> -->
		    </div>
		  </div>
		</div>
	</div>



	<!-- MODAL -->
	<div class="modal" id="viewTaskModal">
	  <div class="modal-background"></div>
	  <div class="modal-card">
	    <header class="modal-card-head">
	      <p class="modal-card-title">Task Description</p>
	      <button class="delete" aria-label="close" onclick="javascript:closeModal();"></button>
	    </header>
	    <section class="modal-card-body">
	      <h1 class="task_title">That Task Doe</h1>
	      <p class="task_description">Your task description goes here</p>
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
	$('#viewTaskModal .task_title').html(title);
	$('#viewTaskModal .task_description').html(description);
	
	
	$('#viewTaskModal').addClass('is-active');
}

function closeModal()
{
	$('#viewTaskModal .task_title').html('');
	$('#viewTaskModal .task_description').html('');
	$('#viewTaskModal').removeClass('is-active');
}

</script>



