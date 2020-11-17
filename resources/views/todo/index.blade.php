@extends('layouts.app')


@section('content')



<div class="conteiner">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="text-right">
                <a class="btn btn-dark mb-2" href="{{ route('todo.create') }}">Create Todo</a>
            </div>
            <div class="card">
                <h4 class="card-header text-center">All Todo</h4>

                <div class="card-body">
                    <ul class="list-group">
                        @forelse($todo as $todo)
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-7">
                                    <a href="{{ route('todo.show', $todo->id ) }}"> {!! $todo->completed ? '<del>':'' !!} {{ $todo->name }} {!! $todo->completed ? '</del>':'' !!}</a>
                                </div>
                                <div class="col-md-5">
                                    <div class="row justify-content-end">
                                        @if (!$todo->completed)
                                        <form action="{{ route('todo.update', $todo->id ) }}" class="mr-2" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input name="completed" type="hidden" value="true">
                                            <input class="btn btn-primary" type="submit" value="Completed">
                                        </form>
                                        @endif
                                        <a class="btn btn-success mr-2"
                                            href="{{ route('todo.edit', $todo->id) }}">Edit</a>

                                        <form action="{{ route('todo.destroy', $todo->id ) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input class="btn btn-danger" type="submit" value="Delete">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @empty
                        <h5 class="text-center">No Todo Found. <a href="{{ route('todo.create') }}">Create Now</a></h5>
                        @endforelse
                </div>
            </div>
            </ul>
        </div>
    </div>

</div>
</div>
</div>

@endsection
