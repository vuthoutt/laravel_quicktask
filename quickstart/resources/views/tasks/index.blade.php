@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>crud </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('task.create') }}"> Create New Product</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>name</th>
        </tr>
        @foreach ($tasks as $task)
        <tr>
            <td>{{ $task->name }}</td>

            <td>
                 <a class="btn btn-info" href="{{ route('task.show',$task->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('task.edit',$task->id) }}">Edit</a>
                <form action="{{ route('task.destroy',$task->id) }}" method="POST">

                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

@endsection
