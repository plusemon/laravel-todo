@extends('layouts.app')


@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card card-default">
            <div class="card-header text-center">All Todos</div>
            <div class="card-body">
               <ul class="list-group">
                   
                    @forelse($todos as $todo)
               <li class="list-group-item @if($todo->completed == true) text-danger @endif">
                        {{$todo->name}}
                        <a href="/todos/{{$todo->id}}/delete" onclick="confirm('Are You Sure Want to Delete?');" class="btn btn-danger btn-sm float-right">Delete</a>
                        @if (!$todo->completed)
                        <a href="/todos/{{$todo->id}}/completed" class="btn btn-info btn-sm float-right mr-2">Complete</a>
                        @else
                        <a href="/todos/{{$todo->id}}/restore" class="btn btn-info btn-sm float-right mr-2">Restore</a>
                        @endif
                        <a class="btn btn-success btn-sm float-right mr-2" href="/todos/{{$todo->id}}/edit">Edit</a>
                        <a href="/todos/{{$todo->id}}" class="btn btn-primary btn-sm float-right mr-2">View</a>                
                    </li>
                    @empty
                        <h4 class="text-center">No Todo Found. <a href="/create">Create Now</a></h4>
                    @endforelse
                    
               </ul>
            </div>
        </div>
    
    </div>
</div>

@endsection