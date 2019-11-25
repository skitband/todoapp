@extends('master')

@section('content')
<main role="main" class="container">
  <div class="jumbotron">
  	@if(Session::has('message'))
  		<div class="alert alert-success alert-dismissible" role="alert">
		    {{Session::get('message')}}
		    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			</button>
		</div>
	@endif
    <div class="card">
	  <div class="card-header">
	    Todo List <a class="btn btn-sm btn-primary float-right" href="{{ route('todo.create')}}" role="button">Add Task</a>
	  </div>
	  <div class="card-body">
	    
	    <br>
	    <div>
		    <ul class="list-group">
				@foreach($todos as $todo)
				<li class="list-group-item">
					<b>{{$todo->task_name}}</b><br>
					<i class="text-muted">{{$todo->task_status}}</i>
					<!-- <a href="todo/{{$todo->id}}/destroy" class="btn btn-danger btn-sm float-right" style="margin-left: 3px;">Delete</a> -->
					<form action="{{ route('todo.destroy', $todo->id) }}" method="POST">@method('DELETE')@csrf<button class="btn btn-danger btn-sm float-right" style="margin-left: 3px;">Delete</button></form>
					@if($todo->task_status != 'completed')
					<form action="{{ route('todo.update', $todo->id) }}" method="POST">@method('PUT')@csrf<button class="btn btn-success btn-sm float-right" style="margin-left: 3px;">Mark as Completed</button></form>
					@endif

				</li>
				@endforeach
			</ul>
			<br>
			<div class="float-right">{{ $todos->links() }}</div>
		</div>
	  </div>
	</div>
    	
  </div>
</main>
@endsection