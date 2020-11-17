@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-10">

        <div class="card card-default">
            <h4 class="card-header text-center">Edit Todo</h4>
            <div class="card-body">
                <form action="{{ route('todo.update',$todo->id ) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <input class="form-control" type="text" name="name" placeholder="Name" value="{{ $todo->name }}">
                    </div>
                    @error('name') <p style="color:red">{{$message}}</p> @enderror
                    <div class="form-group">
                        <textarea class="form-control" type="text" name="description" placeholder="Description" cols="5"
                            rows="6">{{$todo->description}}</textarea>
                    </div>
                    @error('description') <p style="color:red">{{$message}}</p> @enderror
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>


                </form>

            </div>
        </div>
        <div class="text-center">
            <a href="{{ route('todo.index') }}" class="btn btn-info mt-5">Back</a>
        </div>

    </div>
</div>

@endsection
