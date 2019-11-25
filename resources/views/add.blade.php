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
	@if ($errors->any())
	    <div class="alert alert-danger" role="alert">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif
    <h1>Add New Task</h1>
    <br>
    <form method="POST" action="{{ route('todo.store')}}">
    	@csrf
	  	<div class="form-row">
		    <div class="form-group col-md-12">
		      <label for="task_name">Task Name</label>
		      <input type="text" class="form-control" id="task_name" name="task_name">
		    </div>
		    <div class="form-group col-md-12">
		      <label for="task_description">Task Description</label>
		      <textarea class="form-control" id="task_description" name="task_description"></textarea>
		    </div>
	  	</div>
	  <button type="submit" class="btn btn-primary">Post</button>
	</form>
  </div>
</main>
@endsection