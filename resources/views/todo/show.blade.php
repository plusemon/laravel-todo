@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card card-default">
                <div class="card-header text-center">
                   {{$todo->name}}
                </div>
                <div class="card-body">
                    {{$todo->description}}

<div class="mt-3 text-right">
    <a class="btn btn-success" href="/todo/{{$todo->id}}/edit">Edit</a>
    <a href="/todo/{{$todo->id}}/delete" class="btn btn-danger">Delete</a>
</div>

                </div>

            </div>

        </div>
    </div>

    <div class="text-center">
        <a href="/" class="btn btn-info btn-sm my-5">Back</a>
    </div>

@endsection
